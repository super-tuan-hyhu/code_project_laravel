<?php

namespace App\Repositories\CartDetail;

use App\Models\CartDetail;
use App\Repositories\BaseRepositories;

class CartDetailRepository extends BaseRepositories implements CartDetailRepositoryInterface
{

    public function getModel()
    {
        return CartDetail::class;
    }

//    public function getCartDetail()
//    {
//
//    }
}
