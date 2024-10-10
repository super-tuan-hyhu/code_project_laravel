<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\CartDetail\CartDetailRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    protected $cartRespository;
    protected $productsRespository;
    protected $cartDetailRespository;
    public function __construct(CartRepositoryInterface $cartRespository,
                                ProductRepositoryInterface $productRepository, CartDetailRepositoryInterface $cartDetailRepository)
    {
        $this->cartRespository = $cartRespository;
        $this->productsRespository = $productRepository;
        $this->cartDetailRespository = $cartDetailRepository;
    }

    public function cartDetail()
    {
        $cart = $this->cartRespository->getCartDetail();

        $cartFacades = \Gloudemans\Shoppingcart\Facades\Cart::content();
        $totalFacades = \Gloudemans\Shoppingcart\Facades\Cart::total();
        $subFacades = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();


        return view('client.detail.show', compact('cart', 'cartFacades', 'totalFacades', 'subFacades'));
    }

    public function postCart(Request $request, $id)
    {
        if (Auth::check()){
            $userId = Auth::id(); // Lấy id của user hiện tại
            // Kiểm tra xem giỏ hàng của user đã tồn tại hay chưa
            $cart = Cart::where('user_id', $userId)->first();

            // Lấy sản phẩm dựa trên id
            $product = $this->productsRespository->find($id);
            // Nếu giỏ hàng không tồn tại, tạo mới giỏ hàng
            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => $userId,
                    'total_amount' => 0, // Giỏ hàng bắt đầu với tổng tiền là 0
                ]);
            }
            // Kiểm tra sản phẩm có tồn tại trong giỏ hàng không (dựa trên product_id, color_id và size_id)
            $cartDetail = CartDetail::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->where('color_id', $request->color_id)
                ->where('size_id', $request->size_id)
                ->first();

            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            if ($cartDetail) {
                $cartDetail->update([
                    'quantity' => $cartDetail->quantity + $request->quantity
                ]);
            } else {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
                CartDetail::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'color_id' => $request->color_id,
                    'size_id' => $request->size_id,
                    'quantity' => $request->quantity,
                ]);
            }

            // Cập nhật tổng tiền giỏ hàng
            $cart->total_amount += $product->discount * $request->quantity;
            $cart->save();
            return redirect()->back()->with([
                'message' => 'Add Cart Success'
            ]);
        }else{
            $product = $this->productsRespository->find($id);
            $selectedColors = $request->input('color_name');
            $selectedSizes = $request->input('size_name');
            $selectedNumber = $request->input('quantity');
            \Gloudemans\Shoppingcart\Facades\Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->discount ?? $product->price,
                'qty' => $selectedNumber,
                'options' => [
                    'image' => $product->image,
                    'color' => $selectedColors,
                    'size' => $selectedSizes,
                    'discount' => $product->price,
                    'sku' => $product->sku,
                    'cate' => $product->id_category,
                    'brand' => $product->id_brand,
                ]
            ]);
            return back()->with([
                'message' => 'Add Success'
            ]);
        }
    }

    public function deleteCart($id)
    {
        $cartDetail = $this->cartDetailRespository->find($id);

        $cartID = $cartDetail->cart_id;
        $cart = $this->cartRespository->find($cartID);
        $cartDetail->delete();

        $remainingCartItems = $cart->cartDetail;

        $newTotalAmount = $remainingCartItems->sum(function($cartItem) {
            return $cartItem->quantity * $cartItem->productDetail->discount;
        });

        // Cập nhật lại total_amount trong giỏ hàng
        $cart->update(['total_amount' => $newTotalAmount]);

        return redirect()->back()->with([
            'message' => 'Delete Success'
        ]);
    }

    public function updateCart(Request $request, $id)
    {
        if ($request->ajax()) {
            // Retrieve the cart detail
            $cartDetail = $this->cartDetailRespository->find($id);
            $product = $this->productsRespository->find($cartDetail->product_id);

            // Tính toán lại giá trị cũ và giá trị mới dựa trên số lượng
            $oldTotalProduct = $cartDetail->quantity * $product->discount;
            $cartDetail->quantity = $request->quantity;
            $cartDetail->save();

            $newTotalProduct = $cartDetail->quantity * $product->discount;

            // Lấy thông tin giỏ hàng
            $cart = $this->cartRespository->find($cartDetail->cart_id);

            // Cập nhật lại tổng tiền trong giỏ hàng
            $cart->total_amount = $cart->total_amount - $oldTotalProduct + $newTotalProduct;
            $cart->save();

            return response()->json([
                'total_amount' => $cart->total_amount,
                'totalResponse' => $newTotalProduct,
                'message' => 'Cập nhật giỏ hàng thành công!'
            ]);
        }

        return response()->json(['message' => 'Invalid request'], 400);
    }


}
