<?php

namespace CzcScraper\Grabber;

abstract class ProductGrabber implements IGrabber
{

    private $url = 'https://www.czc.cz/';

    protected function getProductData(string $productId): ?array
    {
        $html = file_get_html($this->url . $productId . '/hledat');
        $el = $html->find('#tiles .new-tile', 0);

        $dataAttribute = 'data-ga-impression';

        if ($dataJson = $el->$dataAttribute) {
            $productData = json_decode($dataJson, true);

            $productData['rating'] = $el->find('span.rating', 0)->title;

            return $productData;
        }

        return null;
    }
}
