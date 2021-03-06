<?php

namespace App\Http\Controllers;
use Redirect;

use Illuminate\Http\Request;
use App\web;
use App\CartProducts;
use App\bills;
use App\orders;
use App\products;

class singleItemController extends Controller
{
    //
    public function index($category,$prod_id)
    {
        //
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);
        
        $ItemCategoryTrending = products::where('category', '=',$category)->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=',$category)->orderBy('views', 'ASC')->take(10)->get();
        $selectedItem = products::where('prod_id', '=',$prod_id)->get();
        //updating views of particula ritem
        $update = products::where('prod_id','=',$prod_id)->update(array('views'=>$selectedItem[0]['views']+1));
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.singleItem',compact(['ItemCategoryTrending','products','category','selectedItem','productnames']));
    }

    public function addToCart(Request $request,$prod_id){
        if(session()->get('gmailLoggedIn')){
            if (CartProducts::where('email', '=',session()->get('gmailLoggedIn'))->where('prod_id','=',$prod_id)->count() == 0) {
                $newCart = new CartProducts;
                $newCart->email = session()->get('gmailLoggedIn');
                $newCart->prod_id = $prod_id;
                $newCart->no_of_items = request('quantity_backend');
                $newCart->save();
            }
            // else{
            //     $selectedItemCart = CartProducts::where('email', '=',session()->get('gmailLoggedIn'))->where('prod_id', '=',$prod_id)->get();
            //     $updateCart = CartProducts::where('prod_id','=',$prod_id)->where('email', '=',session()->get('gmailLoggedIn'))->update(array('no_of_items'=>$selectedItemCart[0]['no_of_items']+request('quantity_backend')));
            // }
            $notifications = CartProducts::where('email','=',session()->get('gmailLoggedIn'))->count();
            session(['noofNotifications' => $notifications]);
            return Redirect::to(session('googleLoginBeforeLink')); // Will redirect 2 links back
        } 
    }

    public function deleteItemFromCart($prod_id){
        products::where('prod_id','=',$prod_id)->delete();
        CartProducts::where('prod_id','=',$prod_id)->delete();
        return Redirect::to('/'); // Will redirect 2 links back
    }

    public function updateItem($prod_id){
        $selectedItem = products::where('prod_id', '=',$prod_id)->get();
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.adminUpdate',compact(['selectedItem','productnames']));
    }
}
