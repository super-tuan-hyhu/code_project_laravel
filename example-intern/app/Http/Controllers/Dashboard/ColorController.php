<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Repositories\Color\ColorRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $productRepository;
    protected $colorRepository;
    public function __construct(ProductRepositoryInterface $productRepository
                                ,ColorRepositoryInterface $colorRepository)
    {
        $this->colorRepository = $colorRepository;
        $this->productRepository = $productRepository;
    }

    public function index($id)
    {
        $product = $this->productRepository->find($id);
        $color = $this->colorRepository->getColor($product->id);
        return view('dashboard.color.index', compact('color', 'product'));
    }

    public function create(Request $request, $id)
    {

        $data = $request->all();

        $this->colorRepository->create($data);

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $name = $request->input('name_color');
        $idColor = $request->input('id_color');
        foreach ($idColor as $key => $idC){
            $idColorUp = $this->colorRepository->find($idC);
            $idColorUp->update([
                'name_color' => $name[$key],
            ]);
        }
        return redirect('dashboard/products/' . $id. '/color');
    }

    public function delete(Request $request, $id_product, $id_color)
    {
        $color = $this->colorRepository->find($id_color);
        $color->delete();
        return redirect()->back();
    }

}
