<?php

namespace Fig\Website;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigLinkProcessor extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('processLinks', function(string $input): string {
                $step1 = $this->filterPsrLinks($input);
                $step2 = $this->filterBylawsLinks($step1);
                return $step2;
            }),
        ];
    }

    private function filterPsrLinks(string $input): string
    {
        return preg_replace(
            '/(\[.*?\]:) http(?:s)?:\/\/github\.com\/php-fig\/fig-standards\/blob\/master\/accepted\/PSR-(\d+).*\.md/i',
            '\1 /psr/psr-\2',
            $input
        );
    }

    private function filterBylawsLinks(string $input): string
    {
        return preg_replace(
            '/(\[.*?\]:) http(?:s)?:\/\/github\.com\/php-fig\/fig-standards\/blob\/master\/bylaws\/\d{3}-(.*)\.md/i',
            '\1 /bylaws/\2',
            $input
        );
    }
}
