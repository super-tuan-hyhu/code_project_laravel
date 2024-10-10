<?php

namespace App\Repositories\Size;

use App\Models\Size;
use App\Repositories\BaseRepositories;

class SizeRepository extends BaseRepositories implements SizeRepositoryInterface
{

    public function getModel()
    {
        return Size::class;
    }

    public function getSize($idProduct)
    {
        return $this->model->where('id_product', $idProduct)->get();
    }
}
