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

            $productPageUri = $el->find('h5 a', 0)->href;
            $productHtml = file_get_html($this->url . $productPageUri);

            if ($productHtml->find('span.producer-code', 0)->plaintext !== $productId) {
                return null;
            }

            $rating = $productHtml->find('#product-detail span.rating__label', 0)->plaintext;
            $productData['rating'] = (int)$rating;

            return $productData;
        }

        return null;
    }
}
