<?php

namespace App\Repositories\orderDetail;

use App\Models\OrderDetail;
use App\Repositories\BaseRepositories;

class OrderDetailRepository extends BaseRepositories implements OrderDetailRepositoryInterface
{
    public function getModel()
    {
        return OrderDetail::class;
    }

    public function getDetail($id)
    {
        return $this->model->where('order_id', $id)->get();
    }

    public function getCountProductSale()
    {
        return $this->model->with('products')
                            ->join('products', 'order_detail.product_id', '=', 'products.id')
                            ->selectRaw('order_detail.product_id as productsId,
                                        MAX(order_detail.name_product) as name,
                                        MAX(order_detail.color) as color,
                                        MAX(order_detail.size) as size,
                                        MAX(products.image) as img,
                                        order.status as orderStatus,
                                        SUM(order_detail.number_product ) as totalNumber')
                            ->leftJoin('order', 'order_detail.order_id', '=' , 'order.id_order')
                            ->where('order.status', '=' , 'Giao Hàng Thành Công')
                            ->groupBy('order_detail.product_id', 'order.status')
                            ->orderBy('totalNumber', 'desc')
                            ->limit(3)
                            ->get();
    }
}
