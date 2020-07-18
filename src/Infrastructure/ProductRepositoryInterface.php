<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\Product;

interface ProductRepositoryInterface
{
    public function get(string $id): Product;
    public function save(Product $product): void;
}
