<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Payment;
 use Redirect,Response;
 class RazorpayController extends Controller
 {
 public function razorpayProduct()
 {
 return view('payments.razorpay');
 }
 public function razorPaySuccess(Request $request){
 $data = [
           'user_id' => '1',
           'payment_id' => $request->razorpay_payment_id,
           'amount' => $request->totalAmount,
           'bill_id' => $request->product_id,
        ];
 $getId = Payment::insertGetId($data);  
 $arr = array('msg' => 'Payment successfully credited', 'status' => true);
 return Response()->json($arr);    
 }
 public function RazorThankYou()
 {
 return view('payments.thankyou');
 }
 }