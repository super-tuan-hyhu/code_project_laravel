<?php

namespace App\Repositories\Shipment;

use App\Repositories\RepositoriesInterface;

interface ShipmentRepositoryInterface extends RepositoriesInterface
{
    public function getShipmentOrder($id);
}
