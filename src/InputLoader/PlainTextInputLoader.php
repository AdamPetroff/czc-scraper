<?php

namespace CzcScraper\InputLoader;

class PlainTextInputLoader implements IInputLoader
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function load(): array
    {
        $file = fopen($this->filePath, 'r');

        if(!$file){
            throw new \Exception("Input file not found.");
        }

        $lines = [];
        while(!feof($file)){
            $line = trim(fgets($file));

            if(strlen($line) !== 0) {
                $lines[] = $line;
            }
        }

        fclose($file);

        return $lines;
    }
}
