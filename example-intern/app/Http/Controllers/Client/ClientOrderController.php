<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Repositories\address\AddressRepositoryInterface;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\CartDetail\CartDetailRepositoryInterface;
use App\Repositories\Coupon\CouponRepositoryInterface;
use App\Repositories\order\OrderRepositoryInterface;
use App\Repositories\Shipment\ShipmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClientOrderController extends Controller
{
    protected $addressRepository;
    protected $cartRepository;
    protected $cartDetailRepository;
    protected $couponRepository;
    protected $orderRepository;
    protected $shipmentRepository;
    public function __construct(CartRepositoryInterface $cartRepository,
                                AddressRepositoryInterface $addressRepository,
                                CouponRepositoryInterface $couponRepository,
                                OrderRepositoryInterface $orderRepository,
                                CartDetailRepositoryInterface $cartDetailRepository,
                                ShipmentRepositoryInterface $shipmentRepository)
    {
        $this->addressRepository = $addressRepository;
        $this->cartRepository = $cartRepository;
        $this->cartDetailRepository = $cartDetailRepository;
        $this->couponRepository = $couponRepository;
        $this->orderRepository = $orderRepository;
        $this->shipmentRepository = $shipmentRepository;
    }

    public function index()
    {
        $user = Auth::id();
        $address = $this->addressRepository->getAddressUser($user);
        $default_address = $address->where('is_default', 1)->first();
        $cart = $this->cartRepository->getCartDetail();
        return view('client.order.index', compact('default_address', 'cart'));
    }


    public function confirm(Request $request)
    {
        $data = $request->all();
        $numberCode = mt_rand(1000000000, 9999999999);
        $data['barCode'] = $numberCode;
        if ($this->orderRepository->orderBarCode($numberCode)){
            $numberCode = mt_rand(1000000000, 9999999999);
        }

        $order = $this->orderRepository->create($data);

        $idOrder = $order->id_order;
        $this->shipmentRepository->create([
            'order_id' => $idOrder,
        ]);
        $carts = $this->cartRepository->getCartDetail();

        foreach ($carts->cartDetail as $key => $cart){
            $dataOrder = [
                'product_id' => $cart->productDetail->id,
                'order_id' => $order->id_order,
                'name_product' => $cart->productDetail->name,
                'price_product' => $cart->productDetail->discount,
                'color' => $cart->color->name_color,
                'size' => $cart->size->name_size,
                'sku' => $cart->productDetail->sku,
                'number_product' => $cart->quantity,
                'id_category' => $cart->productDetail->id_category,
                'id_brand' => $cart->productDetail->id_brand,
            ];

            OrderDetail::create($dataOrder);
        }

        if ($request->payment_methods == "Cash on Delivery"){
            $total = $carts->total_amount;
            $this->sendMail($order, $total);
            // delete cartDetail
            foreach ($carts->cartDetail as $cart){
                $this->cartDetailRepository->delete($cart->id_cart);
            }
            $this->updateTotal($carts->id, 0);

            return view('client.order.confirm');
        }elseif ($request->payment_methods == "Payment by Credit Card"){
            return redirect()->back()->with([
                'message' => 'Dng hoan thien'
            ]);
        }
    }

    private function sendMail($order, $total){
        $email_to = $order->email;

        Mail::send('mail.order.send', compact('order', 'total'), function ($message) use ($email_to){
            $message->from('tuanHandsome@gmail.com', 'Tuan Clothing');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }
    public function coupon(Request $request)
    {
        $couponCode = $request->input('coupon');
        $cart = $this->cartRepository->getCartDetail();

        $coupon = $this->couponRepository->applyCoupon($couponCode);
        if (!$coupon) {
            return response()->json([
                'error' => 'Mã coupon không hợp lệ hoặc đã hết hạn'
            ]);
        }
        $discount = 0;
        $total = $cart->total_amount;
        foreach ($cart->cartDetail as $key => $item){
            if ($coupon->value == 1) {
                $discount += $item->productDetail->discount * $item->quantity * ($coupon->promotion / 100);
            }elseif ($coupon->value == 2) {
                $discount += $coupon->promotion;
            }
        }
        $final_total = $total - $discount;
        return response()->json([
            'success' => true,
            'discount' => $discount,
            'final_total' => $final_total,
        ]);
    }

    private function updateTotal($id, $amount)
    {
        $cart = $this->cartRepository->find($id);
        if ($cart){
            $cart->total_amount = $amount;
            $cart->save();
        }
    }
}

