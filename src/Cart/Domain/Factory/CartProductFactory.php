<?php
declare(strict_types=1);

namespace App\Cart\Domain\Factory;

use App\Cart\Domain\CartProduct;
use App\Product\Application\DTO\Decorator\DTODataTypeDecorator;
use App\SharedKernel\Factory\FromArrayFactory;

class CartProductFactory
{
    use FromArrayFactory;

    public static function createFromArray(array $data): CartProduct
    {
        $cartProduct = new CartProduct();

        $data = DTODataTypeDecorator::decorate($data, CartProduct::LABEL_QUANTITY, 'int');

        /** @var CartProduct $cartProduct */
        $cartProduct = self::create($cartProduct, $data);

        return $cartProduct;
    }
}
