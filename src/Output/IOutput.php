<?php

namespace CzcScraper\Output;

interface IOutput
{
    public function setData(array $data): void;
	public function output(): void;
}
