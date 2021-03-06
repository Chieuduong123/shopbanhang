<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Models\Carts;
use App\Models\Products;
use App\Services\CountCartByUserService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


// use App\Http\Controllers\Controller;
// use App\Models\User;

class ProductController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     $products = Products::orderByDesc('id')->paginate(10);
    //     return view('shopproduct',compact('products'));
    // }

     public function index()
    {
        $products = Products::orderByDesc('id')->paginate(12);
        $countCart = null;
         if (Auth::check() && Auth::user()->type == 2) {
            $countCart = app(CountCartByUserService::class)->handle();
        }
        return view('index',compact('products', 'countCart'));
    }

    
     /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return app(ProductService::class)->show($id);
        
    }

    public function getListCart($id)
    {
       // \DB::Connection()->enableQueryLog();
        return Carts::select('products.name  as name_product', 'staffs.name')->join('products', 'products.id', '=', 'carts.products_id')
         ->join('staffs', 'staffs.id', '=', 'carts.staffs_id')
         ->where(['staffs_id' => $id])
         ->get();
        // dd(\DB::getQueryLog());
    }

    public function showDetail($id)
    {
        $product = Products::findOrFail($id);
        $products = Products::orderByDesc('id')->paginate(4);
        $countCart = null;
        if (Auth::check() && Auth::user()->type == 2) {
            $countCart = app(CountCartByUserService::class)->handle();
        }
        return view('detailsproduct',compact('product','products','countCart'));
    }
 

  
}