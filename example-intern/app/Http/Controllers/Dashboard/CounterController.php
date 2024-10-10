<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\address\AddressRepositoryInterface;
use App\Repositories\Coupon\CouponRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\alert;

class CounterController extends Controller
{
    protected $productsRepository;
    protected $userRepository;
    protected $addressRepository;
    protected $couponRepository;
    public function __construct(ProductRepositoryInterface $productRepository,
                                UserRepositoryInterface $userRepository,
                                AddressRepositoryInterface $addressRepository,
                                CouponRepositoryInterface $couponRepository)
    {
        $this->productsRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
        $this->couponRepository = $couponRepository;
    }

    public function index()
    {
        $products = $this->productsRepository->getProduct();
        $user = $this->userRepository->all();
        $cart = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        // number products
        foreach ($cart as $item){
            $product = $products->where('id', $item->id)->first();
            $item->max_qty = $product->quantity;
        }
        return view('dashboard.counter.index', compact( 'products','user' , 'cart', 'total', 'subtotal'));
    }

    public function getUser($id)
    {
        $user = $this->userRepository->find($id);
        $address = $this->addressRepository->getAddressUser($user->id);
        $default_address = $address->where('is_default', 1)->first();
//        Log::info('User Data:', ['user' => $user, 'default_address' => $default_address]);
        return response()->json([
            'user' => $user,
            'default_address' => $default_address
        ]);
    }

    public function add(Request $request, $id){

        $product = $this->productsRepository->find($id);

        $selectedColors = $request->input('name_color');
        $selectedSizes = $request->input('nameSizeee');
        $selectedNumber = $request->input('numberCounter');
        Cart::add([
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

    public function delete(Request $request)
    {
        if ($request->ajax()){
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }

        return back()->with([
            'message' => 'Delete Success'
        ]);
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()){
            $response['cart'] = Cart::destroy();

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
        return back()->with([
            'message' => 'Destroy Success'
        ]);
    }

    public function update(Request $request)
    {
        if ($request->ajax()){
            $response['cart'] = Cart::update($request->rowId, $request->qty);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }

    public function coupon(Request $request)
    {
        $couponCode = $request->input('coupon');
        $cart = Cart::content();

        $coupon = $this->couponRepository->applyCoupon($couponCode);
        if (!$coupon) {
            return response()->json([
                'error' => 'Mã coupon không hợp lệ hoặc đã hết hạn'
            ]);
        }

        $discount = 0;
        $total = session('cart_total') ? session('cart_total') : Cart::total(); // Nếu có, sử dụng cart_total; không thì lấy Cart::total()
        foreach ($cart as $item) {
            if ($coupon->value == 1) {
                // discount percent
                $discount += $item->price * $item->qty * ($coupon->promotion / 100);
            } elseif ($coupon->value == 2) {
                $discount += $coupon->promotion;
            }
        }


        $finalPrice = $total - $discount;
        /// Còn phải làm ngược lại về session;
        $finalPrice = max($finalPrice, 0);

        return response()->json([
            'success' => true,
            'discount' => $discount,
            'final_price' => $finalPrice,
        ]);
    }

    public function updateTotal(Request $request)
    {
        if ($request->ajax()){
            $total = $request->input('total');

            session(['cart_total' => $total]);
            return response()->json(['success' => true]);
        }
    }

}
