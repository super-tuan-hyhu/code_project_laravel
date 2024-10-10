<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Brand\BandRepositoryInterface;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productsRespository;
    protected $brandRespository;
    protected $cartRespository;
    public function __construct(ProductRepositoryInterface $productRepository,
                                BandRepositoryInterface $bandRepository, CartRepositoryInterface $cartRespository)
    {
        $this->productsRespository = $productRepository;
        $this->brandRespository = $bandRepository;
        $this->cartRespository = $cartRespository;
    }

    public function index()
    {
        $product = $this->productsRespository->getProduct();
        $brand =$this->brandRespository->getBrandLimit();
        $brandDesc = $this->brandRespository->getBrandt();
        $cart = $this->cartRespository->getCartDetail();
        foreach ($product as $list){
            $list->firstColorId = $list->color()->first()->id_color;
        }

        $cartFacades = \Gloudemans\Shoppingcart\Facades\Cart::content();
        $totalFacades = \Gloudemans\Shoppingcart\Facades\Cart::total();
        $subFacades = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();

        return view('client.home.index', compact('product', 'brand', 'brandDesc', 'cart', 'cartFacades', 'subFacades' ,'totalFacades'));
    }
}
