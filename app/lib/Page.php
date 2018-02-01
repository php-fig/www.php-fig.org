<?php
/**
 * @license See the file LICENSE for copying permission
 */

declare(strict_types=1);

namespace Fig\Website;

use InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

class Page
{
    const INCLUDES_DIR  = 'source/_includes/';
    const BYLAWS_DIR    = 'source/_bylaws/';
    const PSR_DIR       = 'source/_psr/';
    const BYLAWS_GLOB   = self::INCLUDES_DIR . 'fig-standards/bylaws/*.md';
    const PSR_GLOB      = self::INCLUDES_DIR . 'fig-standards/accepted/*.md';
    const PSR_PATTERN   = '#accepted/(psr-\d+)(?:-(?:\w+(?:-\w+)*?)+)?(?:-(meta|examples))?\.md$#i';
    const BYLAW_PATTERN = '#bylaws/(\d+)-(?:\w+(?:-\w+)*)+\.md$#i';

    const TYPE_BYLAW       = 'bylaw';
    const TYPE_PSR         = 'psr';
    const TYPE_PSR_RELATED = 'related';

    const TYPE_TO_DIR_MAP = [
        self::TYPE_BYLAW       => self::BYLAWS_DIR,
        self::TYPE_PSR         => self::PSR_DIR,
        self::TYPE_PSR_RELATED => self::PSR_DIR,
    ];

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $dest;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $meta = [];

    /**
     * @var Page[]
     */
    private $related = [];

    public function __construct(string $source)
    {
        switch(true) {
            case preg_match(self::PSR_PATTERN, $source, $matches):
                $this->type = isset($matches[2]) ? self::TYPE_PSR_RELATED : self::TYPE_PSR;
                $this->meta['psr_number'] = strtolower($matches[1]);
                $this->meta['permalink'] = "/psr/{$this->meta['psr_number']}/" . ( $matches[2] ?? '' );
                break;
            case preg_match(self::BYLAW_PATTERN, $source, $matches):
                $this->type = self::TYPE_BYLAW;
                break;
            default:
                throw new InvalidArgumentException(sprintf("Source '%s' doesn't match pattern", $source));
        }

        $this->source        = $source;
        $this->dest          = static::extractDestinationFromSourceFilename($source, $this->type);
        $this->meta['title'] = static::extractTitleFromSourceHeading($source, $this->type, $this->meta);
        $this->meta['markdown_source'] = str_replace(self::INCLUDES_DIR, '', $source);
    }

    public function renderContent(): string
    {
        $frontMatter = $this->meta;
        $frontMatter['related'] = [];
        $self = [ 'name' => $this->getMeta()['title'], ];

        foreach ($this->related as $related) {
            $frontMatter['related'][] = [
                'name' => $related->getMeta()['title'],
                'permalink' => $related->getMeta()['permalink']
            ];
        }

        switch($this->type) {
            case self::TYPE_BYLAW:
                $frontMatter['use'] = [ 'bylaws' ]; break;
            case self::TYPE_PSR:
                array_unshift($frontMatter['related'], $self); break;
            case self::TYPE_PSR_RELATED:
                $frontMatter['related'][] = $self; break;
        }

        $yamlFrontMatter = rtrim(Yaml::dump($frontMatter));

        $content   = <<<CONTENT
---
$yamlFrontMatter
---

{{ parent() }}

CONTENT;

        return $content;
    }

    public function writeToDest(): void
    {
        file_put_contents($this->dest, $this->renderContent());
    }

    public function getDest(): string
    {
        return $this->dest;
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param Page[] $pages
     */
    public function setRelated(array $pages)
    {
        $this->related = $pages;
    }

    public function __toString(): string
    {
        return $this->dest;
    }

    private static function extractTitleFromSourceHeading(string $source, string $type, array $meta = []): string
    {
        $file  = fopen($source, 'r');
        $title = rtrim(ltrim(fgets($file), '# '));
        fclose($file);

        if ($type === self::TYPE_PSR && strpos($title, $meta['psr_number']) !== 0) {
            $title = strtoupper($meta['psr_number']) . ': ' . $title;
        }

        return $title;
    }

    private static function extractDestinationFromSourceFilename(string $source, string $type): string
    {
        if (! isset(static::TYPE_TO_DIR_MAP[$type])) {
            throw new InvalidArgumentException("Unknown type: $type");
        }

        $destDir = static::TYPE_TO_DIR_MAP[$type];

        return strtolower($destDir . basename($source, '.md')) . '.twig';
    }
}
