<?php

namespace Fig\Website;

use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class MarkdownConverterFactory
{
    public static function create(): GithubFlavoredMarkdownConverter
    {
        $supportedLanguages = [
            'php',
            'http', # inside PSR-7
        ];

        $config = [
            'heading_permalink' => [
                'id_prefix' => '',
                'fragment_prefix' => '',
                'insert' => 'after',
            ],
        ];

        $converter = new GithubFlavoredMarkdownConverter($config);
        $environment = $converter->getEnvironment();
        $environment
            ->addExtension(new TableExtension())
            ->addExtension(new HeadingPermalinkExtension())
            ->addRenderer(FencedCode::class, new FencedCodeRenderer($supportedLanguages))
            ->addRenderer(IndentedCode::class, new IndentedCodeRenderer($supportedLanguages))
        ;

        return $converter;
    }
}
