<?php

namespace CzcScraper\Grabber;

class ExpandedDataGrabber extends ProductGrabber
{

    public function grab(string $productId): ?array
    {
        $productData = $this->getProductData($productId);

        if (!$productData) {
            return null;
        }

        return [
            'name' => $productData['name'],
            'price' => $productData['price'],
            'rating' => $productData['rating']
        ];
    }
}
