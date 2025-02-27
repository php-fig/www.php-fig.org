<?php

namespace Fig\Website;

/**
 * Ported from \Aptoma\Twig\TokenParser\MarkdownTokenParser
 */
class MarkdownTokenParser extends \Twig\TokenParser\AbstractTokenParser
{
    /**
     * {@inheritdoc}
     */
    public function parse(\Twig\Token $token): MarkdownNode
    {
        $lineno = $token->getLine();

        $this->parser->getStream()->expect(\Twig\Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideMarkdownEnd'), true);
        $this->parser->getStream()->expect(\Twig\Token::BLOCK_END_TYPE);

        return new MarkdownNode($body, $lineno, $this->getTag());
    }

    /**
     * Decide if current token marks end of Markdown block.
     */
    public function decideMarkdownEnd(\Twig\Token $token): bool
    {
        return $token->test('endmarkdown');
    }

    /**
     * {@inheritdoc}
     */
    public function getTag(): string
    {
        return 'markdown';
    }
}
