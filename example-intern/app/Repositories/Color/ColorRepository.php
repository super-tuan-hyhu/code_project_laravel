<?php

namespace App\Repositories\Color;

use App\Models\Color;
use App\Repositories\BaseRepositories;

class ColorRepository extends BaseRepositories implements ColorRepositoryInterface
{

    public function getModel()
    {
        return Color::class;
    }

    public function getColor($idProduct)
    {
        return $this->model->where('id_product', $idProduct)->get();
    }
}
