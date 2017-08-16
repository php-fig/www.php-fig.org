<?php
/**
 * @license See the file LICENSE for copying permission
 */

declare(strict_types=1);

namespace Fig\Website;

class Bylaw
{
    const PREFIX = 'source/_includes/';

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $dest;

    public function __construct(string $title, string $source, string $dest)
    {
        $this->title  = $title;
        $this->source = $source;
        $this->dest   = $dest;
    }

    public static function fromSource(string $source): self
    {
        $file = fopen($source, 'r');
        $title = rtrim(ltrim(fgets($file), '# '));
        fclose($file);

        $dest = str_replace('includes/fig-standards/', '', $source);
        $dest = preg_replace('#\.(md|markdown)$#', '.twig', $dest);

        return new static($title, $source, $dest);
    }

    public function __toString(): string
    {
        return $this->dest;
    }

    public function alreadyExists(): bool
    {
        return file_exists($this->dest);
    }

    public function writeToDest(): void
    {
        file_put_contents($this->dest, $this->createContent());
    }

    private function createContent(): string
    {
        $relSource = str_replace(self::PREFIX, '', $this->source);
        $content   = <<<CONTENT
---
title: $this->title
markdown_source: $relSource
use: [bylaws]
---

{{ parent() }}

CONTENT;

        return $content;
    }
}
