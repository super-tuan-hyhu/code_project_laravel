<?php

namespace App\Repositories\address;

use App\Models\Address;
use App\Repositories\BaseRepositories;

class AddressRepository extends BaseRepositories implements AddressRepositoryInterface
{

    public function getModel()
    {
        return Address::class;
    }

    public function getAddressUser($id_user)
    {
        return $this->model->where('id_user', $id_user)->get();
    }
}
