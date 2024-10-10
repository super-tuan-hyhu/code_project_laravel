<?php

namespace App\Repositories\Products;

interface ProductRepositoryInterface
{
    public function getProduct();
    public function productCodeExists($number);
}
