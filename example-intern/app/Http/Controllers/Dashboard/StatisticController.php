<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\order\OrderRepositoryInterface;
use App\Repositories\orderDetail\OrderDetailRepositoryInterface;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    protected $orderSuccessRepository;
    protected $orderSuccessDetailRepository;
    protected $categoryRespository;
    public function __construct(OrderRepositoryInterface $orderSuccessRepository,
                                OrderDetailRepositoryInterface $orderSuccessDetailRepository,
                                CategoryRepositoryInterface $categoryRepository)
    {
        $this->orderSuccessRepository = $orderSuccessRepository;
        $this->orderSuccessDetailRepository = $orderSuccessDetailRepository;
        $this->categoryRespository = $categoryRepository;
    }

    public function index(){
        $order = $this->orderSuccessRepository->getOrderSuccess();
        $total = $this->orderSuccessRepository->getCountTotal();
        $countStatus = $this->orderSuccessRepository->getCountStatus();
        $cancel = $this->orderSuccessRepository->getCountCancel();
        $orderDetail = $this->orderSuccessDetailRepository->getCountProductSale();
        $orderUser = $this->orderSuccessRepository->getTotalUser();
        $category = $this->categoryRespository->getProductsTotal();
        return  view('dashboard.statistic.index',
                compact('order', 'total', 'orderDetail' ,'countStatus', 'cancel', 'orderUser', 'category'));

    }
}
