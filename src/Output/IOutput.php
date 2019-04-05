<?php

namespace CzcScraper\Output;

interface IOutput
{
    public function setData(array $data);
	public function output();
}
