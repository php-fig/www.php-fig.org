<?php

namespace Fig\Website;

use Aptoma\Twig\Extension\MarkdownEngineInterface;
use Closure;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * @todo
 * We should really use a native PHP markdown parser, because this is way slower and relies on external dependencies,
 * but I couldn't find any which would produce the same syntax highlighting as Jekyll on Github Pages,
 * which is Kramdown + Rouge (both are rubygems)
 *
 * This is still preferable to a Javascript syntax highlighter running on the browser, though.
 */
class ExternalProcessMarkdownEngine implements MarkdownEngineInterface
{
    /**
     * @var string
     */
    private $command;

    /**
     * @var int
     */
    private $timeout;

    /**
     * @var callable
     */
    private $createProcess;

    public function __construct(string $command, int $timeout = 20, callable $processFactory = null)
    {
        $this->command = $command;
        $this->timeout = $timeout;

        if (! $processFactory) {
            $processFactory = Closure::fromCallable([ $this, 'createDefaultProcess' ]);
        }

        $this->createProcess = $processFactory;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ProcessFailedException
     */
    public function transform($content)
    {
        /** @var Process $externalProcess */
        $externalProcess = ($this->createProcess)($this->command, null, null, $content, $this->timeout);
        $externalProcess->mustRun();

        return $externalProcess->getOutput();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return __CLASS__;
    }

    private function createDefaultProcess(...$args): Process
    {
        return new Process(...$args);
    }
}
