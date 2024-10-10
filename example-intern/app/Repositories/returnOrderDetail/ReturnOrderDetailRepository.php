<?php

namespace App\Repositories\returnOrderDetail;

use App\Models\Return_Order_Detail;
use App\Repositories\BaseRepositories;

class ReturnOrderDetailRepository extends BaseRepositories implements ReturnOrderDetailRepositoryInterface
{
    public function getModel()
    {
        return Return_Order_Detail::class;
    }
}
