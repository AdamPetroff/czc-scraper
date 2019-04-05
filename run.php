<?php

use CzcScraper\Dispatcher;
use CzcScraper\Grabber\ExpandedDataGrabber;
use CzcScraper\Grabber\PriceGrabber;
use CzcScraper\InputLoader\PlainTextInputLoader;
use CzcScraper\Output\JsonStdOutput;

require_once __DIR__ . '/src/require.php';

echo <<<BLA
-i input file path. If not provided, default input file will be used.
-g grabber type. Use 'p' for PriceGrabber and 'e' for ExpandedDataGrabber. If not provided, ExpandedDataGrabber will be used.

BLA;

$args = getopt('i:g:');

if (isset($args['i'])) {
    $inputFile = $args['i'];
} else {
    $inputFile = __DIR__ . '/vstup.txt';
}

if (isset($args['g'])) {
    if ($args['g'] === 'p') {
        $grabber = new PriceGrabber();
    } elseif ($args['g'] === 'e') {
        $grabber = new ExpandedDataGrabber();
    } else {
        throw new Exception('Invalid grabber argument value.');
    }
} else {
    // default Grabber
    $grabber = new ExpandedDataGrabber();
}

$inputLoader = new PlainTextInputLoader($inputFile);

$dispatcher = new Dispatcher($grabber, new JsonStdOutput(), $inputLoader);
$dispatcher->run();
