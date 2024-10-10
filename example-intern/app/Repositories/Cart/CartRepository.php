<?php

namespace App\Repositories\Cart;
use App\Models\Cart;
use App\Repositories\BaseRepositories;
use Illuminate\Support\Facades\Auth;

class CartRepository extends BaseRepositories implements CartRepositoryInterface
{

    public function getModel()
    {
        return Cart::class;
    }

    public function getCartDetail()
    {
        return $this->model->where('user_id', Auth::id())
            ->with('cartDetail:cart_id,product_id,quantity,size_id,color_id')
            ->with('cartDetail.productDetail:id,name,discount,image,price,quantity')
            ->with('cartDetail.productDetail.category:id,name_cate')
            ->with('cartDetail.color:id_color,name_color')
            ->with('cartDetail.size:id_size,name_size')
            ->first();
    }


}
