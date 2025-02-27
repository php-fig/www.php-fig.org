<?php

namespace Fig\Website;

use League\CommonMark\GithubFlavoredMarkdownConverter;

/**
 * MarkdownExtension provides support for Markdown.
 * Ported from \Aptoma\Twig\Extension\MarkdownExtension
 */
class MarkdownExtension extends \Twig\Extension\AbstractExtension
{
    public function __construct(
        private readonly GithubFlavoredMarkdownConverter $markdownConverter,
    ) {}

    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new \Twig\TwigFilter(
                'markdown',
                $this->parseMarkdown(...),
                ['is_safe' => ['html']]
            )
        ];
    }

    /**
     * Transform Markdown content to HTML
     *
     * @param string|null $content The Markdown content to be transformed, coming from Twig
     * @return string The result of the Markdown engine transformation into HTML
     */
    public function parseMarkdown(?string $content): string
    {
        if (null === $content) {
            return '';
        }

        return $this->markdownConverter->convert($content);
    }

    /**
     * {@inheritdoc}
     */
    public function getTokenParsers(): array
    {
        return [new MarkdownTokenParser()];
    }
}
