<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Size\SizeRepositoryInterface;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    protected $productRepository;
    protected $sizeRepository;
    public function __construct(ProductRepositoryInterface $productRepository,
                                SizeRepositoryInterface $sizeRepository)
    {
        $this->productRepository = $productRepository;
        $this->sizeRepository = $sizeRepository;
    }

    public function index($id)
    {
        $product = $this->productRepository->find($id);
        $size = $this->sizeRepository->getSize($product->id);
        return view('dashboard.size.index', compact('product', 'size'));
    }

    public function create(Request $request, $id)
    {
        $data = $request->all();

        $this->sizeRepository->create($data);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name_size');
        $idSize = $request->input('id_size');

        foreach ($idSize as $key => $item){
            $idSizePro = $this->sizeRepository->find($item);
            $idSizePro->update([
                'name_size' => $name[$key],
            ]);
        }

        return redirect()->back();
    }

    public function delete($id_pro, $id_size)
    {
        $size = $this->sizeRepository->find($id_size);
        $size->delete();
        return redirect()->back();
    }
}
