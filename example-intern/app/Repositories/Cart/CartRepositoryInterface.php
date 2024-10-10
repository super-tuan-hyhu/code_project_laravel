<?php

namespace App\Repositories\Cart;

use App\Repositories\RepositoriesInterface;

interface CartRepositoryInterface extends RepositoriesInterface
{
    public function getCartDetail();
}
