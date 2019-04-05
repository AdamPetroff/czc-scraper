<?php

namespace CzcScraper\Output;


class JsonStdOutput implements IOutput
{

    private $data;

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function output()
    {
        $json = json_encode($this->data);

        echo $json . "\n";
    }
}
