<?php

namespace App\Repositories\Size;

use App\Repositories\RepositoriesInterface;

interface SizeRepositoryInterface extends RepositoriesInterface
{
    public function getSize($idProduct);
}
