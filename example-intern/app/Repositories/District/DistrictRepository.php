<?php

namespace App\Repositories\District;

use App\Models\District;
use App\Repositories\BaseRepositories;

class DistrictRepository extends BaseRepositories implements DistrictRepositoryInterface
{

    public function getModel()
    {
        return District::class;
    }

    public function getDistrict($id_provence)
    {
        return $this->model->where('province_id', $id_provence)->get();
    }
}
