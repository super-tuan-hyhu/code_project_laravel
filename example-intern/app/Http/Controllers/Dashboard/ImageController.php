<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Color\ColorRepositoryInterface;
use App\Repositories\ImageColor\ImageColorRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\alert;

class ImageController extends Controller
{
    protected $productRepository;
    protected $colorRepository;
    protected $imageColorRepository;

    public function __construct(ProductRepositoryInterface $productRepository,
                                ColorRepositoryInterface $colorRepository,
                                ImageColorRepositoryInterface $imageColorRepository)
    {
        $this->productRepository = $productRepository;
        $this->colorRepository = $colorRepository;
        $this->imageColorRepository = $imageColorRepository;
    }

    public function index($id_pro)
    {
        $product = $this->productRepository->find($id_pro);
        $color = $this->colorRepository->getColor($product->id);

        $image = $this->imageColorRepository->all();

        return view('dashboard.imageColor.index', compact('product', 'color', 'image'));
    }

    public function create($id, $id_color)
    {
        $product = $this->productRepository->find($id);
        $color = $this->colorRepository->find($id_color);
        return view('dashboard.imageColor.create', compact('color', 'product'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image_pro')){
            foreach ($request->file('image_pro') as $imageColor){
                $upload = $imageColor;
                if ($upload->isValid()){
                    $data['image_pro'] = Common::uploadFile($upload, 'dashboard/assets/img/image');
                    $this->imageColorRepository->create($data);
                }else {
                    alert('Fail');
                }
            }
        }

        return redirect('dashboard/products/'. $id . '/image');
    }

    public function update(Request $request, $id, $id_image)
    {
        $image = $this->imageColorRepository->find($id_image);
        $data = $request->all();

        if ($request->hasFile('image_pro')){
            $data['image_pro'] = Common::uploadFile($request->file('image_pro'), 'dashboard/assets/img/image');
            $old_image = $request->input('old_image');
            if ($old_image && Storage::disk('public')->exists($old_image)){
                Storage::disk('public')->delete($old_image);
            }
        } else {
            $data['image_pro'] = $image->image_pro;
        }

        $image->update($data);

        return redirect()->back();
    }

    public function delete(Request $request, $id ,$id_image)
    {
        $image = $this->imageColorRepository->find($id_image);

        if ($image && $image->image_pro != ''){
            Storage::disk('public')->delete($image->image_pro);
        }
        $image->delete();
        return redirect()->back();
    }

}
