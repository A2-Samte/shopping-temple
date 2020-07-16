<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function root(Request $request)
    {
        return view('index');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $products='';

        if(view()->exists($request->path())){
            if($request->path()=='ecommerce-products'){

                $products=Product::get();

            }
            return view($request->path(),['products'=>$products]);
        }
        return view('pages-404');
    }

    
}
