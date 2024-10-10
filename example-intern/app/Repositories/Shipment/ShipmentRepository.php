<?php

namespace App\Repositories\Shipment;

use App\Models\Shipments;
use App\Repositories\BaseRepositories;

class ShipmentRepository extends BaseRepositories implements ShipmentRepositoryInterface
{

    public function getModel()
    {
        return Shipments::class;
    }

    public function getShipmentOrder($id)
    {
        return $this->model->where('order_id', $id)->first();
    }
}
