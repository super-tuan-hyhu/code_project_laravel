<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Shipments;
use App\Repositories\order\OrderRepositoryInterface;
use App\Repositories\Shipment\ShipmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShipmentController extends Controller
{
    protected $orderRepository;
    protected $shipmentRepository;
    public function __construct(OrderRepositoryInterface $orderRepository,
                                ShipmentRepositoryInterface $shipmentRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->shipmentRepository = $shipmentRepository;
    }

    public function updateShip(Request $request, $id)
    {
        $order = $this->orderRepository->find($id);
        $shipment = $this->shipmentRepository->getShipmentOrder($order->id_order);


        // Kiểm tra và cập nhật từng trạng thái
        if ($order->status === 'Chưa có thông tin' && $shipment->shipments_1 === 'Chưa có thông tin') {
            $shipment->shipments_1 = "Chờ Xác Nhận";
            $order->status = "Chờ Xác Nhận";
        }
        elseif ($shipment->shipments_1 === 'Chờ Xác Nhận' && $shipment->shipments_2 === 'Chưa xử lý') {
            $shipment->shipments_2 = "Chuẩn Bị Đơn Hàng";
        }
        elseif ($shipment->shipments_2 === 'Chuẩn Bị Đơn Hàng' && $shipment->shipments_3 === 'Chưa xử lý') {
            $shipment->shipments_3 = "Đang Đóng Hàng";
        }
        elseif ($shipment->shipments_3 === 'Đang Đóng Hàng' && $shipment->shipments_4 === 'Chưa xử lý') {
            $shipment->shipments_4 = "Đang Giao Hàng";
            $order->status = "Đang Giao Hàng";
        }
        elseif ($shipment->shipments_4 === 'Đang Giao Hàng' && $shipment->shipments_5 === 'Chưa xử lý') {
            $shipment->shipments_5 = "Đã Đến Điểm Giao";
        }
        elseif ($shipment->shipments_5 === 'Đã Đến Điểm Giao' && $shipment->shipments_6 === 'Chưa xử lý') {
            $shipment->shipments_6 = "Người Dùng Đang Thanh Toán";
        }
        elseif ($shipment->shipments_6 === 'Người Dùng Đang Thanh Toán' && $shipment->shipments_7 === 'Chưa xử lý') {
            $shipment->shipments_7 = "Giao Hàng Thành Công";
            $order->status = "Giao Hàng Thành Công";
        }
        else {
            return back()->with('messageOrder', 'Đã hoàn thành quá trình giao hàng.');
        }

        $order->save();
        $shipment->save();
        return back()->with('messageOrder', 'Cập Nhật Thành Công');
    }

    public function cancelShip(Request $request, $id)
    {
        $request->validate([
            'cancel_8' => 'required|string|min:5', // Yêu cầu nhập lý do hủy, ít nhất 5 ký tự
        ], [
            'cancel_8.required' => 'Vui lòng nhập lý do hủy.',
            'cancel_8.min' => 'Lý do hủy phải có ít nhất 5 ký tự.'
        ]);
        $order = $this->orderRepository->find($id);
        $shipment = $this->shipmentRepository->getShipmentOrder($order->id_order);
        if ($order->status != "Giao Hàng Thành Công" && $shipment->shipments_7 != "Giao Hàng Thành Công"){
            $order->status = 'Đã Hủy Đơn';
            $shipment->cancel_8 = $request->input('cancel_8');
            $order->save();
            $shipment->save();
            return back()->with('messageOrder', 'Hủy Đơn Thành Công');
        }else{
            return back()->with('messageOrder', 'Hủy Đơn Thất Bại');
        }

    }
}
