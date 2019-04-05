<?php

namespace CzcScraper\Grabber;

interface IGrabber
{
    public function grab(string $productId): ?array;
}
