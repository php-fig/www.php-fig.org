<?php

namespace Fig\Website;

use Aptoma\Twig\Extension\MarkdownEngineInterface;

class NullSafeCommonMarkEngine implements MarkdownEngineInterface
{
    /** @var MarkdownEngineInterface */
    private $engine;

    public function __construct(MarkdownEngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function transform($content): string
    {
        return $this->engine->transform((string) $content);
    }

    public function getName(): string
    {
        return $this->engine->getName();
    }
}
