<?php

namespace App\Repositories\Color;

use App\Repositories\RepositoriesInterface;

interface ColorRepositoryInterface extends RepositoriesInterface
{
    public function getColor($idProduct);
}
