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
                if (str_contains($input, 'accepted/PSR-')) {
                    return $this->filterPsrLinks($input); 
                }

                if (str_contains($input, '/php-fig/per-')) {
                    return $this->filterPerLinks($input); 
                }
                
                return $this->filterBylawsLinks($input);
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

    private function filterPerLinks(string $input): string
    {
        return preg_replace(
            '/(\[.*?\]:) http(?:s)?:\/\/github\.com\/php-fig\/per-([\w-]+)\/blob\/[\w.]+\/.*\.md/i',
            '\1 /per/\2',
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
