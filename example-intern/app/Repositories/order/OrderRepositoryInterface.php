<?php

namespace App\Repositories\order;

use App\Repositories\RepositoriesInterface;

interface OrderRepositoryInterface extends RepositoriesInterface
{
    public function getOrder($searchBy, $keyword);

    // barCode
    public function orderBarCode($number);

    // Order Success
    public function getOrderSuccess();

    // Sum total
    public function getCountTotal();
    // count status success
    public function getCountStatus();

    // count order cancel
    public function getCountCancel();

    // user order
    public function getTotalUser();
}
