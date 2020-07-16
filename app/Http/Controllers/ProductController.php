<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    public function create(Request $request){
        //request()->validate(['productname'=>'required']);
        // Product::create(
        //     request()->except('_token')
        // );
        
        // return request()->all();
        $newproduct=request()->except('_token');

        if ($files = $request->file('file')) {
            $destinationPath = 'assets/images/product'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();

            if (!$files->move($destinationPath, $profilefile)) {
                return 'Error saving the file.';
            }
            $newproduct['file'] = $profilefile;
        }

        Product::create($newproduct);

        //return ['producto'=>$newproduct,'file'=>request->file('file')];
        echo '<pre>';
        print_r($newproduct);
        //echo '<br>request1';
        //print_r($request);
        echo '<br>files: <br>';
        print_r($_REQUEST);
        echo '<br>files: <br>';
        print_r($_FILES);
        echo '</pre>';
        //return response()->json(['producto'=>$newproduct]);

    }

    public function detail($idproduct){

        //echo '<pre>';
        //print_r($idproduct);
        $productdetail=Product::where('id','=',$idproduct)->first();
        //return response()->json(['detail'=>$productdetail]);
        return view('ecommerce-product-detail', ['product'=>$productdetail]);
       


    }
}
