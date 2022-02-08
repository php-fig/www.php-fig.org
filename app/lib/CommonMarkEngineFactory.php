<?php

namespace Fig\Website;

use Aptoma\Twig\Extension\MarkdownEngine\PHPLeagueCommonMarkEngine;
use Aptoma\Twig\Extension\MarkdownEngineInterface;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\Environment;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class CommonMarkEngineFactory
{
    public static function create(): MarkdownEngineInterface
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

        $environment = Environment::createCommonMarkEnvironment();
        $environment->mergeConfig($config);
        $environment
            ->addExtension(new TableExtension())
            ->addExtension(new HeadingPermalinkExtension())
            ->addBlockRenderer(FencedCode::class, new FencedCodeRenderer($supportedLanguages))
            ->addBlockRenderer(IndentedCode::class, new IndentedCodeRenderer($supportedLanguages))
        ;

        return new NullSafeCommonMarkEngine(
            new PHPLeagueCommonMarkEngine(
                new GithubFlavoredMarkdownConverter([], $environment)
            )
        );
    }
}
