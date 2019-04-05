<?php

namespace CzcScraper\Grabber;

class PriceGrabber extends ProductGrabber
{

    public function grab(string $productId): ?array
    {
        $productData = $this->getProductData($productId);

        if (!$productData) {
            return null;
        }

        return ['price' => $productData['price']];
    }
}
