<?php

namespace CzcScraper;

use CzcScraper\Grabber\IGrabber;
use CzcScraper\InputLoader\IInputLoader;
use CzcScraper\Output\IOutput;

class Dispatcher
{
	private $grabber;
	private $output;
    private $inputLoader;


	public function __construct(IGrabber $grabber, IOutput $output, IInputLoader $inputLoader)
	{
		$this->grabber = $grabber;
		$this->output = $output;
        $this->inputLoader = $inputLoader;
    }

	public function run()
	{
	    $inputs = $this->inputLoader->load();
	    $productsData = [];

        foreach ($inputs as $productId) {
            $productsData[$productId] = $this->grabber->grab($productId);
	    }

        $this->output->setData($productsData);
		$this->output->output();
	}

}
