<?php

namespace App\Repositories\District;

use App\Repositories\RepositoriesInterface;

interface DistrictRepositoryInterface extends RepositoriesInterface
{
    public function getDistrict($id_provence);
}
