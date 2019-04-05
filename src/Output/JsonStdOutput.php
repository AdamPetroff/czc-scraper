<?php

namespace CzcScraper\Output;


class JsonStdOutput implements IOutput
{

    private $data;

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function output(): void
    {
        $json = json_encode($this->data);

        echo $json . "\n";
    }
}
