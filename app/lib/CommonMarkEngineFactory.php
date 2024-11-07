<?php

namespace Fig\Website;

use Aptoma\Twig\Extension\MarkdownEngine\PHPLeagueCommonMarkEngine;
use Aptoma\Twig\Extension\MarkdownEngineInterface;
use League\CommonMark\EnvironmentInterface;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class CommonMarkEngineFactory
{
    public static function create(
        EnvironmentInterface $environment,
    ): MarkdownEngineInterface {
        return new NullSafeCommonMarkEngine(
            new PHPLeagueCommonMarkEngine(
                new GithubFlavoredMarkdownConverter([], $environment)
            )
        );
    }
}
