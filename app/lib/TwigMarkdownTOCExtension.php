<?php

namespace Fig\Website;

use League\CommonMark\DocParser;
use League\CommonMark\DocParserInterface;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Extension\TableOfContents\TableOfContentsGenerator;
use League\CommonMark\HtmlRenderer;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigMarkdownTOCExtension extends AbstractExtension
{
    private readonly DocParserInterface $docParser;
    private readonly ElementRendererInterface $htmlRenderer;

    public function __construct(
        EnvironmentInterface $environment,
    ) {
        $this->docParser = new DocParser($environment);
        $this->htmlRenderer = new HtmlRenderer($environment);
    }

    public function getFilters()
    {
        return [
            new TwigFilter('markdown_toc', function(string $markdown): string {
                return $this->renderTOC($markdown);
            }),
        ];
    }

    private function renderTOC(string $markdown): string
    {
        $generator = new TableOfContentsGenerator(
            TableOfContentsGenerator::STYLE_ORDERED,
            TableOfContentsGenerator::NORMALIZE_RELATIVE,
            minHeadingLevel: 2,
            maxHeadingLevel: 3,
        );

        $toc = $generator->generate($this->docParser->parse($markdown));

        return $toc === null
            ? ''
            : $this->htmlRenderer->renderBlock($toc, inTightList: true);
    }
}
