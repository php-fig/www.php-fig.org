#!/usr/bin/env php
<?php
/**
 * @license See the file LICENSE for copying permission
 */

declare(strict_types=1);

use Fig\Website\Bylaw;

if (version_compare(PHP_VERSION, '7.1.0', '<')) {
    fwrite(STDERR, "PHP minimum version required is 7.1.0, current is ".PHP_VERSION.PHP_EOL);
    exit(1);
}

require 'vendor/autoload.php';

(function() use ($argv) {

    $overwrite = in_array('-f', $argv, true);

    $bylawsGlob = Bylaw::PREFIX . "fig-standards/bylaws/*.md";

    [ $bylaws, $skippedSome ] = createBylaws($bylawsGlob, $overwrite);

    $numBylaws = count($bylaws);
    echo PHP_EOL, "Created {$numBylaws} bylaws", PHP_EOL;

//    $psrsGlob = glob(Psr::$prefix . "fig-standards/accepted/*.md");

    if ($skippedSome) {
        echo PHP_EOL, "use -f flag to overwrite skipped files", PHP_EOL;
    }

})();

function createBylaws(string $glob, bool $overwrite): array
{
    $sources = glob($glob);

    $bylaws = [];

    foreach ($sources as $source) {
        $bylaw = Bylaw::fromSource($source);

        echo "Creating '$bylaw'... ";

        if ($bylaw->alreadyExists() && ! $overwrite) {
            echo "Skipping, file already exists.", PHP_EOL;
            continue;
        }

        $bylaw->writeToDest();
        $bylaws[] = $bylaw;
        echo "Ok.", PHP_EOL;
    }

    return [ $bylaws, count($bylaws) < count($sources) ];
}
