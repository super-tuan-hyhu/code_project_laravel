<?php

namespace App\Repositories\address;

use App\Repositories\RepositoriesInterface;

interface AddressRepositoryInterface extends RepositoriesInterface
{
    public function getAddressUser($id_user);
}
