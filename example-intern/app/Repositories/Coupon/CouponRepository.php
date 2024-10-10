<?php

namespace App\Repositories\Coupon;

use App\Models\Coupon;
use App\Repositories\BaseRepositories;

class CouponRepository extends BaseRepositories implements CouponRepositoryInterface
{

    public function getModel()
    {
        return Coupon::class;
    }

    public function getCoupon()
    {
        return $this->model->paginate(5);
    }

    public function applyCoupon($couponCode)
    {
        return $this->model->where('name_voucher', $couponCode)
                            ->where('date_start', '<=', now())
                            ->where('date_end', '>=', now())
                            ->first();
    }
}
