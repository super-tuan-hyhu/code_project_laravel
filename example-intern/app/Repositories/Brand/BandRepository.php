<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\BaseRepositories;

class BandRepository extends BaseRepositories implements BandRepositoryInterface
{

    public function getModel()
    {
        return Brand::class;
    }

    public function getBrand()
    {
        return $this->model->paginate(5);
    }

    public function getBrandLimit()
    {
        return $this->model->orderBy('id', 'asc')->limit(1)->get();
    }

    public function getBrandt()
    {
        return $this->model->orderBy('id', 'desc')->limit(1)->get();
    }
}
