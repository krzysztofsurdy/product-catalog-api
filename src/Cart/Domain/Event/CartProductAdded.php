<?php
declare(strict_types=1);

namespace App\Cart\Domain\Event;

use App\Product\Domain\ProductData;
use App\SharedKernel\Event\CartEvent;

class CartProductAdded extends CartEvent
{
    public static function createFor(string $cartId, ProductData $productData): CartCreated
    {
        return new self($cartId, [
            'product_data' => $productData->serialize()
        ]);
    }

    public function getProductData(): ProductData
    {
        return ProductData::create($this->payload['product_data']);
    }
}