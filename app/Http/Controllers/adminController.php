<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\products;
use Illuminate\Support\Facades\DB;
use App\CartProducts;
class adminController extends Controller
{
    //
    public function index()
    {
        //
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.adminPost',compact(['productnames']));
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

    public function cartItems(){
        $gmail = session('gmailLoggedIn');
        $species = products::where('category', '=','Species')->orderBy('prod_id', 'DESC')->take(12)->get();
        $seafood = products::where('category', '=','SeaFood')->orderBy('prod_id', 'DESC')->take(12)->get();
        $cartItems = CartProducts::where('email','=',$gmail)->join('products','cart_products.prod_id','=','products.prod_id')->get();
        $totalPrice = CartProducts::select(DB::raw('sum(cart_products.no_of_items*products.offer_price) as totalPrice'))->where('email','=',$gmail)->join('products','cart_products.prod_id','=','products.prod_id')->get();
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.cartItems',compact(['cartItems','seafood','species','totalPrice','productnames']));
    }

    public function updateQty(Request $request){
        $gmail = session('gmailLoggedIn');
        CartProducts::where('email','=',$gmail)->where('prod_id','=',request('selectedId'))->update(['no_of_items'=>request('selectedQuantity')]);
        return Redirect::to('/cartItems');
    }

    public function deleteItem(Request $request){
        $gmail = session('gmailLoggedIn');
        CartProducts::where('email','=',$gmail)->where('prod_id','=',request('selectedIdForDel'))->delete();
        $notifications = CartProducts::where('email','=',$gmail)->count();
        session(['noofNotifications' => $notifications]);
        return Redirect::to('/cartItems');
    }

    public function adminLogin(Request $request){
        session(['gmailLoggedIn' => 'adminMail']);
        session(['NameLoggedIn' => 'admin']);
        return Redirect::to(session('googleLoginBeforeLink'));
    }

    public function updateProduct(Request $request){
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
            products::where('prod_id','=',request('prod_id_update'))->update(['product_pic1'=>$name1]);
        }
        //image2 post
        if ($request->hasFile('picTwo')) 
        {
            $image2 = $request->file('picTwo');
            $name2 = time().'2.'.$image2->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image2->move($destinationPath, $name2);
            products::where('prod_id','=',request('prod_id_update'))->update(['product_pic1'=>$name2]);
        }
        //image3 post
        if ($request->hasFile('picThree')) 
        {
            $image3 = $request->file('picThree');
            $name3 = time().'3.'.$image3->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image3->move($destinationPath, $name3);
            products::where('prod_id','=',request('prod_id_update'))->update(['product_pic1'=>$name3]);
        }
        products::where('prod_id','=',request('prod_id_update'))->update(['product_name'=>request('productName'),'product_price'=>request('productPrice'),'offer_price'=>request('offerPrice'),'total_quantity'=>request('totalQuantity'),'description'=>request('description'),'category'=>request('productType'),'type'=>request('QuantityType')]);
        return Redirect::to(session('googleLoginBeforeLink')); 
    }
}
