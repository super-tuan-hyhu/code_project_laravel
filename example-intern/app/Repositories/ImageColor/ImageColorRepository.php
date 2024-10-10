<?php

namespace App\Repositories\ImageColor;

use App\Models\ImageColor;
use App\Repositories\BaseRepositories;

class ImageColorRepository extends BaseRepositories implements ImageColorRepositoryInterface
{

    public function getModel()
    {
        return ImageColor::class;
    }

    public function getImageColor($id_color)
    {
        return $this->model->where('id_color', $id_color)->get();
    }

}
