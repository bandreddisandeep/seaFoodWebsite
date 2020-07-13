<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
class adminController extends Controller
{
    //
    public function index()
    {
        //
        return view('User.adminPost');
    }

    //post product
    public function postProduct(Request $request)
    {
        $name1 = '';
        $name2 = '';
        $name3 = '';
        //image1 post
        if ($request->hasFile('picOne')) 
        {
            $image1 = $request->file('picOne');
            $name1 = time().'1.'.$image1->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image1->move($destinationPath, $name1);
        }
        //image2 post
        if ($request->hasFile('picTwo')) 
        {
            $image2 = $request->file('picTwo');
            $name2 = time().'2.'.$image2->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image2->move($destinationPath, $name2);
        }
        //image3 post
        if ($request->hasFile('picThree')) 
        {
            $image3 = $request->file('picThree');
            $name3 = time().'3.'.$image3->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image3->move($destinationPath, $name3);
        }
        $productDetails = new products;
        $productDetails->product_pic1 = $name1;
        $productDetails->product_pic2 = $name2;
        $productDetails->product_pic3 = $name3;
        $productDetails->product_name = request('productName');
        $productDetails->product_price = request('productPrice');
        $productDetails->offer_price = request('offerPrice');
        $productDetails->total_quantity = request('totalQuantity');
        $productDetails->description = request('description');
        $productDetails->type = request('QuantityType');
        $productDetails->category = request('productType');
        $productDetails->views = 0;
        $productDetails->save();
        return redirect('/admin/PostProduct');
    }
}
