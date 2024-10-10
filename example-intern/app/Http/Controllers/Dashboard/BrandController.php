<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Brand\BandRepositoryInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    protected $brandRepository;
    public function __construct(BandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $brand = $this->brandRepository->getBrand();
        return view('dashboard.brand.index', compact('brand'));
    }

    public function create()
    {
        return view('dashboard.brand.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image_brand')){
            $data['image_brand'] = Common::uploadFile($request->file('image_brand'), 'dashboard/assets/img/brand');
        }

        $this->brandRepository->create($data);
        return redirect('dashboard/brand');
    }

    public function update($id)
    {
        $brand = $this->brandRepository->find($id);
        return view('dashboard.brand.update', compact('brand'));
    }

    public function edit(Request $request, $id)
    {
        $brand = $this->brandRepository->find($id);
        $data = $request->all();

        if ($request->hasFile('image_brand')){
            $data['image_brand'] = Common::uploadFile($request->file('image_brand'), 'dashboard/assets/img/brand');

            $file_old = $request->input('file_old');
            if($file_old && Storage::disk('public')->exists($file_old)){
                Storage::disk('public')->delete($file_old);
            }
        }else{
            $data['image_brand'] = $brand->image_cate;
        }

        $this->brandRepository->update($data, $id);
        return redirect('dashboard/brand/update/'. $id);
    }

    public function delete($id)
    {
        $brand = $this->brandRepository->find($id);

        if ($brand){
            $image = $brand->image_brand;
            $this->brandRepository->delete($id);
            if ($image != ""){
                Storage::disk('public')->delete($image);
            }
        }

        return redirect()->back();
    }
}
