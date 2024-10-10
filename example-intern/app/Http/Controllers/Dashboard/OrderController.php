<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\order\OrderRepositoryInterface;
use App\Repositories\orderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Shipment\ShipmentRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $orderDetailRepository;
    protected $shipmentRepository;

    public function __construct(OrderRepositoryInterface $orderRepository,
                                OrderDetailRepositoryInterface $orderDetailRepository,
                                ShipmentRepositoryInterface $shipmentRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->shipmentRepository = $shipmentRepository;
    }

    public function index(Request $request)
    {
        $order = $this->orderRepository->getOrder('email', $request->get('search'));
        return view('dashboard.order.index', compact('order'));
    }

    public function detail($id)
    {
        $order = $this->orderRepository->find($id);
        $orderDetail = $this->orderDetailRepository->getDetail($order->id_order);
        $shipment = $this->shipmentRepository->getShipmentOrder($order->id_order);
        return view('dashboard.orderDetail.index', compact('order', 'orderDetail', 'shipment'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $numberCode = mt_rand(1000000000, 9999999999);
        $data['barCode'] = $numberCode;
        if ($this->orderRepository->orderBarCode($numberCode)){
            $numberCode = mt_rand(1000000000, 9999999999);
        }
        $order = $this->orderRepository->create($data);
        $idOrder = $order->id_order;
        $this->shipmentRepository->create(['order_id' => $idOrder]);
        $carts = Cart::content();
        foreach ($carts as $cart){
            $dataOrder = [
                'product_id' => $cart->id,
                'order_id' => $order->id_order,
                'name_product' => $cart->name,
                'price_product' => $cart->price,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'sku' => $cart->options->sku,
                'number_product' => $cart->qty,
                'id_category' => $cart->options->id_cate,
                'id_brand' => $cart->options->id_brand,
            ];

            $orderDetail = $this->orderDetailRepository->create($dataOrder);
        }
        Cart::destroy();
        return back();
    }
}
