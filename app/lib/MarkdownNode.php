<?php

namespace Fig\Website;

/**
 * Represents a markdown node.
 * Ported from \Aptoma\Twig\Node\MarkdownNode
 */
class MarkdownNode extends \Twig\Node\Node
{
    public function __construct(\Twig\Node\Node $body, $lineno, $tag = 'markdown')
    {
        parent::__construct(array('body' => $body), array(), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param \Twig\Compiler A Twig\Compiler instance
     */
    public function compile(\Twig\Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('ob_start();' . PHP_EOL)
            ->subcompile($this->getNode('body'))
            ->write('$content = ob_get_clean();' . PHP_EOL)
            ->write('preg_match("/^\s*/", $content, $matches);' . PHP_EOL)
            ->write('$lines = explode("\n", $content);' . PHP_EOL)
            ->write('$content = preg_replace(\'/^\' . $matches[0]. \'/\', "", $lines);' . PHP_EOL)
            ->write('$content = join("\n", $content);' . PHP_EOL)
            ->write('echo $this->env->getExtension(\'Fig\Website\MarkdownExtension\')->parseMarkdown($content);' . PHP_EOL);
    }
}
