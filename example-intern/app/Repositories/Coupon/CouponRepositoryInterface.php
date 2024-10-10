<?php

namespace App\Repositories\Coupon;

use App\Repositories\RepositoriesInterface;

interface CouponRepositoryInterface extends RepositoriesInterface
{
    public function getCoupon();
    public function applyCoupon($couponCode);
}
