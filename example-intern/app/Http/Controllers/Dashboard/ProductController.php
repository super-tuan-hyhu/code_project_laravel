<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Products;
use App\Models\Size;
use App\Repositories\Brand\BandRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $categoryRepository;
    protected $brandRepository;
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository,
                                CategoryRepositoryInterface $categoryRepository,
                                BandRepositoryInterface $brandRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $product = $this->productRepository->getProduct();
        $category = $this->categoryRepository->all();
        return view('dashboard.products.index', compact('product', 'category'));
    }

    public function create()
    {
        $category = $this->categoryRepository->getCategory();
        $brand = $this->brandRepository->all();
        return view('dashboard.products.create', compact('category', 'brand'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $number = mt_rand(1000000000, 9999999999);

        if ($number == $this->productRepository->productCodeExists($number)){
            echo 'loi';
        }else {
            $number = mt_rand(1000000000, 9999999999);
        }
        $data['barcode'] = $number;
        if ($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'dashboard/assets/img/product');
        }

        $product = $this->productRepository->create($data);
        $idProduct = $product->id;

        $colors = $request->input('name_color');
        $sizes = $request->input('name_size');

        foreach ($colors as $color){
            Color::create(['id_product' => $idProduct, 'name_color' => $color]);
        }

        foreach ($sizes as $size){
            Size::create(['id_product' => $idProduct, 'name_size' => $size]);
        }

        return redirect('../dashboard/products');
    }

    public function update($id)
    {
        $products = $this->productRepository->find($id);
        $brand = $this->brandRepository->all();
        $category = $this->categoryRepository->all();
        return view('dashboard.products.update', compact('category', 'brand', 'products'));
    }

    public function edit(Request $request, $id)
    {
        $product = $this->productRepository->find($id);
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'dashboard/assets/img/product');

            $file_old = $request->input('file_old');
            if ($file_old && Storage::disk('public')->exists($file_old)){
                Storage::disk('public')->delete($file_old);
            }
        }else{
            $data['image'] = $product->image;
        }

        $this->productRepository->update($data, $id);

        return redirect('dashboard/products/update/' . $id);
    }


    public function delete($id)
    {
        $product = $this->productRepository->find($id);
        $product->delete();
        return redirect()->back();
    }
}
