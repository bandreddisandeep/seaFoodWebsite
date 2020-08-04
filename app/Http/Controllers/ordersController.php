<?php

namespace App\Http\Controllers;
use Redirect;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CartProducts;
use App\bills;
use App\orders;
use App\products;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;
class ordersController extends Controller
{
    //
    public function index(){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);

        $species = products::where('category', '=','Species')->orderBy('prod_id', 'DESC')->take(12)->get();
        $seafood = products::where('category', '=','SeaFood')->orderBy('prod_id', 'DESC')->take(12)->get();
        $bills = bills::where('email_id','=',session()->get('gmailLoggedIn'))->join('orders','bills.Bill_id','=','orders.Bill_id')->join('products','orders.prod_id','=','products.prod_id')->get();
        $individualBills = bills::where('email_id','=',session()->get('gmailLoggedIn'))->get();
        return view('User.orderItems',compact(['bills','individualBills','species','seafood']));
    }
       public function checkoutList(Request $request){
        $cartProducts = CartProducts::where('email', '=',session()->get('gmailLoggedIn'))->get();
        $BillIDGenerated = 'BRP'.date('YmdHis'.rand(1,100));
        $newBill = new bills;
        $newBill->email_id = session()->get('gmailLoggedIn');
        $newBill->Bill_id = $BillIDGenerated;
            $newBill->Bill_price = request('total_price');
            $newBill->Bill_status = 'Paid';
            $newBill->save();
        foreach($cartProducts as $cartProduct){			
            $newOrder = new orders;
            $newOrder->prod_id = $cartProduct->prod_id;
            $newOrder->sel_quantity = $cartProduct->no_of_items;
            $newOrder->Bill_id = $BillIDGenerated;
            $newOrder->status = 'paid';
            $newOrder->save();
        }
        CartProducts::where('email','=',session()->get('gmailLoggedIn'))->delete();
        $notifications = 0;
        session(['noofNotifications' => $notifications]);
        Mail::to(session()->get('gmailLoggedIn'))->queue(new OrderPlaced($BillIDGenerated));
        return Redirect::to('/');
    }
}
