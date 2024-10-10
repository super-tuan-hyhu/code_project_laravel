<?php

namespace App\Repositories\returnOrder;

use App\Models\Return_Order;
use App\Repositories\BaseRepositories;

class ReturnOrderRepository extends BaseRepositories implements ReturnOrderRepositoryInterface
{
    public function getModel()
    {
        return Return_Order::class;
    }
}
