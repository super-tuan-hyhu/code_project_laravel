<?php

namespace App\Repositories\order;

use App\Models\Order;
use App\Repositories\BaseRepositories;

class OrderRepository extends BaseRepositories implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }

    public function getOrder($searchBy, $keyword)
    {
        return $this->model->where($searchBy, 'like', '%'. $keyword . '%')
                            ->orderBy('id_order', 'desc')
                            ->paginate(5)
                            ->appends(['search' => $keyword]);
    }

    public function orderBarCode($number)
    {
        return $this->model->where('barCode')->exists();
    }

    public function getOrderSuccess()
    {
        return $this->model->where('status', 'Giao Hàng Thành Công')->get();
    }

    public function getCountTotal()
    {
        return $this->model->where('status', '=', 'Giao Hàng Thành Công')
                            ->sum('total');
    }

    public function getCountStatus()
    {
        return $this->model->where('status', '=', 'Giao Hàng Thành Công')
                            ->count();
    }

    public function getCountCancel()
    {
        return $this->model->where('status', '=', 'Đã Hủy Đơn')
            ->count();
    }

    public function getTotalUser()
    {
        return $this->model->join('users', 'order.account', '=' , 'users.id')
                            ->selectRaw('users.id, users.name, users.avatar, users.email ,SUM(order.total) as total_spent')
                            // Lấy All
//                          ->selectRaw('users.* ,SUM(order.total) as total_spent')
                            ->where('status', 'Giao Hàng Thành Công')
                            ->groupBy('users.id', 'users.name', 'users.avatar', 'users.email')
                            // lấy all
//                          ->groupBy('users.id')
                            ->orderBy('total_spent', 'desc')
                            ->limit(3)
                            ->get();
    }

}
