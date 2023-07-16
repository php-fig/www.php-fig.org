<?php

namespace Fig\Website;

use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\Environment;
use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\TableExtension;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class CommonMarkEnvironmentFactory
{
    public static function create(): EnvironmentInterface
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

        return $environment;
    }
}
