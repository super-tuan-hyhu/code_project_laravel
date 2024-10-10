<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Coupon\CouponRepositoryInterface;
use App\Utilities\Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\alert;

class CouponController extends Controller
{
    protected $couponRepository;
    public function __construct(CouponRepositoryInterface $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function index()
    {
        $coupon = $this->couponRepository->all();
        return view('dashboard.coupon.index', compact('coupon'));
    }

    public function create()
    {
        return view('dashboard.coupon.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $dateStart = $request->input('date_start');
        $dateEnd = $request->input('date_end');
        if ($dateStart >= $dateEnd){
            return redirect()->back()->with([
                'messageDate' => 'Ngày Bắt đầu không được lớn hơn ngày kết thúc',
            ]);
        }
        if ($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'dashboard/assets/img/coupon');
        }

        $this->couponRepository->create($data);

        return redirect('dashboard/coupon');
    }

    public function update($id)
    {
        $coupon = $this->couponRepository->find($id);
        return view('dashboard.coupon.update', compact('coupon'));
    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();
        $coupon = $this->couponRepository->find($id);

        $dateStart = $request->input('date_start');
        $dateEnd = $request->input('date_end');
        if ($dateStart >= $dateEnd){
            return redirect()->back()->with([
                'messageDate' => 'Ngày Bắt đầu không được lớn hơn ngày kết thúc',
            ]);
        }
        if ($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'dashboard/assets/img/coupon');
            $file_old = $request->input('file_old');
            if ($file_old && Storage::disk('public')->exists($file_old)){
                Storage::disk('public')->delete($file_old);
            }
        }else{
            $data['image'] = $coupon->image;
        }

        $this->couponRepository->update($data, $id);
        return redirect()->back()->with([
            'message' => 'Update Success'
        ]);
    }

    public function delete($id)
    {
        $coupon = $this->couponRepository->find($id);

        if ($coupon)
        {
            $image = $coupon->image;
            $this->couponRepository->delete($id);

            if ($image != ''){
                Storage::disk('public')->delete($image);
            }
        }

        return redirect()->back()->with([
            'message' => 'Delete Success'
        ]);
    }
}
