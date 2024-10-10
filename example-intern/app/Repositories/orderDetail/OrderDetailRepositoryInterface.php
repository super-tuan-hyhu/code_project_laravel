<?php

namespace App\Repositories\orderDetail;

use App\Repositories\RepositoriesInterface;

interface OrderDetailRepositoryInterface extends RepositoriesInterface
{
    public function getDetail($id);

    // count products order detail
    public function getCountProductSale();
}
