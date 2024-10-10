<?php

namespace App\Repositories\Products;

use App\Models\Products;
use App\Repositories\BaseRepositories;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Products::class;
    }

    public function getProduct()
    {
        return $this->model->paginate(5);
    }

    public function productCodeExists($number){
        return $this->model->where('barcode', $number)->exists();
    }
}
