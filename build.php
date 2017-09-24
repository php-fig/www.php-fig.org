#!/usr/bin/env php
<?php
/**
 * @license See the file LICENSE for copying permission
 */

declare(strict_types=1);

namespace Fig\Website;

if (version_compare(PHP_VERSION, '7.1.0', '<')) {
    fwrite(STDERR, "PHP minimum version required is 7.1.0, current is ".PHP_VERSION.PHP_EOL);
    exit(1);
}

require 'vendor/autoload.php';

(function(array $argv) {

    [ $overwrite, $createBylaws, $createPsr ] = parseArgs($argv);

    $skippedSomeBylaws = $skippedSomePsr = false;

    if ($createBylaws) {
        echo 'Creating bylaws...', PHP_EOL;
        [ $bylaws, $skippedSomeBylaws ] = createEntries(Bylaw::class, BYLAWS_GLOB, $overwrite);

        $numBylaws = count($bylaws);
        echo "Created {$numBylaws} bylaws", PHP_EOL, PHP_EOL;
    }

    if ($createPsr) {
        echo 'Creating PSRs...', PHP_EOL;
        [ $psr, $skippedSomePsr ] = createEntries(Psr::class, PSR_GLOB, $overwrite);

        $numPsr = count($psr);
        echo "Created {$numPsr} PSRs", PHP_EOL, PHP_EOL;
    }

    if ($skippedSomeBylaws || $skippedSomePsr) {
        echo "use -f flag to overwrite skipped files", PHP_EOL;
    }

})($argv);

function parseArgs(array $argv): array
{
    $overwrite    = false;
    $createBylaws = false;
    $createPsr    = false;

    foreach ($argv as $arg) {
        switch ($arg) {
            case '-f': $overwrite = true; break;
            case 'psr': $createPsr = true; break;
            case 'bylaws': $createBylaws = true; break;
        }
    }

    if (! ($createBylaws || $createPsr)) {
        $createPsr = $createBylaws = true;
    }

    return [ $overwrite, $createBylaws, $createPsr ];
}

function createEntries(string $class, string $pattern, bool $overwrite): array
{
    $sources = glob($pattern);

    $entries = [];

    foreach ($sources as $source) {
        /** @var Psr|Bylaw $entry */
        $entry = $class::fromSource($source);

        echo "Creating '$entry'... ";

        if ($entry->alreadyExists() && ! $overwrite) {
            echo "Skipping, file already exists.", PHP_EOL;
            continue;
        }

        $entry->writeToDest();
        $entries[] = $entry;
        echo "Ok.", PHP_EOL;
    }

    return [ $entries, count($entries) < count($sources) ];
}

function createPsr(string $source): Psr
{
    $match = preg_match('/(psr-\d+)(?:-(\w+(?:-\w+)*)+)?(?:-(meta|example))?\.md$/i', $source, $matches);

    if (! $match) {
        throw new \InvalidArgumentException(sprintf("Source doesn't match pattern: %s", $source));
    }

    $psrNumber = strtolower($matches[1]);
    $shortName = $matches[2] ?? '';
    $type      = $matches[3] ?? 'psr';

    $file = fopen($source, 'r');
    $title = rtrim(ltrim(fgets($file), '# '));
    fclose($file);

    if (strpos($title, $psrNumber) !== 0) {
        $title = $psrNumber . ': ' . $title;
    }

    $dest = PSR_DIR . $psrNumber . '-' . $shortName . '.twig';
    $dest = strtolower($dest);

    if ($type !== 'psr') {
        return new static($title, $source, $dest, $related);
    }
}
