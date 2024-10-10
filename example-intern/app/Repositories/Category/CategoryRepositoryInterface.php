<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getCategory();

    // sum products
    public function getProductsTotal();
}
