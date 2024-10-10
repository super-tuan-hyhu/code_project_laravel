<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Repositories\Color\ColorRepositoryInterface;
use App\Repositories\ImageColor\ImageColorRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    protected  $productRespository;
    protected $imageColorRespository;
    protected $colorRespository;
    public function __construct(ProductRepositoryInterface $productRepository,
                                ImageColorRepositoryInterface $imageColorRepository,
                                ColorRepositoryInterface $colorRepository)
    {
        $this->productRespository = $productRepository;
        $this->imageColorRespository = $imageColorRepository;
        $this->colorRespository = $colorRepository;
    }


    public function index(Request $request,$id)
    {
        $colorId = $request->segment(6);
        $product = $this->productRespository->find($id);
        $image = $this->imageColorRespository->getImageColor($colorId);
        $color = $this->colorRespository->getColor($product);
        $colorClasses = [
            'Xanh Dương' => 'border-sky-500',
            'Đỏ' => 'bg-red-500',
            'Cam' => 'bg-orange-500',
            'Nâu' => 'bg-green-500',
            'Xanh Nước Biển' => 'bg-purple-500',
            'Vàng' => 'bg-yellow-500',
            'Xám' => 'border-slate-500',
            'Đen' => 'bg-slate-900',
            'Trắng' => 'bg-slate-200',
            'Hồng' => 'bg-pink-500',
        ];

        return view('client.detail.index', compact('product', 'image', 'color', 'colorId' ,'colorClasses'));
    }

    public function postComment(Request $request)
    {
        $data = $request->all();

        Comment::create($data);
        return redirect()->back()->with([
            'message' => 'Comment Success'
        ]);
    }
}
