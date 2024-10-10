<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Repositories\order\OrderRepositoryInterface;
use App\Repositories\orderDetail\OrderDetailRepositoryInterface;
use App\Repositories\returnOrder\ReturnOrderRepositoryInterface;
use App\Repositories\returnOrderDetail\ReturnOrderDetailRepositoryInterface;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    protected $orderRepository;
    protected $orderDetailRepository;
    protected $returnOrderRepository;
    protected $returnOrderDetailRepository;
    public function __construct(OrderRepositoryInterface $orderRepository,
                                OrderDetailRepositoryInterface $orderDetailRepository,
                                ReturnOrderRepositoryInterface $returnOrderRepository,
                                ReturnOrderDetailRepositoryInterface $returnOrderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->returnOrderRepository = $returnOrderRepository;
        $this->returnOrderDetailRepository = $returnOrderDetailRepository;
    }

    public function index(Request $request)
    {
        $order = $this->orderRepository->getOrder('email', $request->get('search'));
        return view('dashboard.returnOrder.index', compact('order'));
    }

    public function showCancel($id)
    {
        $order = $this->orderRepository->find($id);
        $orderDetail = $this->orderDetailRepository->getDetail($order->id_order);
        return view('dashboard.returnOrder.show', compact('order', 'orderDetail'));
    }

    public function returnOrder(Request $request, $id)
    {
        $order = $this->orderRepository->find($id);


        $order_id = $order->id_order;
        $customer = $order->account;
        $productId = $request->products;
        $quantity = $request->quantities;

        $returnOrder = $this->returnOrderRepository->create([
            'order_id' => $order_id,
            'customer_id' => $customer,
            'total_refund_amount' => 0,
            'refund_status' => 'Pending',
            'reason' => $request->reason,
        ]);

        $totalRefundAmount = 0;

        foreach ($productId as $index => $product){
            $quantity = $quantity[$index];
            $orderDetail = OrderDetail::where('order_id' , $order->id_order)->first();

            $refundAmount = $orderDetail->price_product * $quantity;
            $totalRefundAmount += $refundAmount;

            $this->returnOrderDetailRepository->create([
                'return_order_id' => $returnOrder->id,
                'product_id' => $orderDetail->product_id,
                'size' => $orderDetail->size,
                'color' => $orderDetail->color,
                'refund_amount' => $refundAmount,
                'quantity' => $quantity,
                'id_category' => $orderDetail->id_category,
                'id_brand' => $orderDetail->id_brand,
            ]);

            // update number order detail
            $orderDetail->number_product -= $quantity;
            // check order detail if number_product == 0 delete
            if ($orderDetail->number_product == 0){
                $orderDetail->delete();
            }else{
                $orderDetail->save();
            }
        }

        $returnOrder->total_refund_amount = $totalRefundAmount;
        $returnOrder->save();


        $order->total -= $totalRefundAmount;
        $order->save();

        return redirect()->back()->with('success', 'Hoàn trả đơn hàng thành công.');
    }
}
