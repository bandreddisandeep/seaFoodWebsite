<?php

namespace App\Http\Controllers;
use App\web;
use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;

class HomeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);

        $species = products::where('category', '=','Species')->orderBy('prod_id', 'DESC')->take(12)->get();
        $seafood = products::where('category', '=','SeaFood')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::orderBy('views', 'DESC')->take(12)->get();
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.home',compact(['species','seafood','products','productnames']));
    }

    public function SpeciesPage(){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);

        $data = array('name'=>"Virat Gandhi");
   
        $species = products::where('category', '=','Species')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=','Species')->orderBy('views', 'ASC')->take(5)->get();
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.SpeciesHomePage',compact(['species','products','productnames']));
    }
    //load more function 
    public function SpeciesPageLoadMore(Request $request){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);
        
        $species = products::where('category', '=','Species')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=','Species')->orderBy('views', 'ASC')->take(request('totalProducts')+5)->get();
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.SpeciesHomePage',compact(['species','products','productnames']));
    }
    public function SeafoodPage(){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);
        
        $SeaFood = products::where('category', '=','SeaFood')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=','SeaFood')->orderBy('views', 'ASC')->take(5)->get();
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.SeafoodHomePage',compact(['SeaFood','products','productnames']));
    }
    //load more function 
    public function SeafoodPageLoadMore(Request $request){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);
        
        $SeaFood = products::where('category', '=','SeaFood')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=','SeaFood')->orderBy('views', 'ASC')->take(request('totalProducts')+5)->get();
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.SeafoodHomePage',compact(['SeaFood','products','productnames']));
    }

    public function searchItem(Request $request){
        //storing link
      
        $species = products::where('category', '=','Species')->orderBy('prod_id', 'DESC')->take(12)->get();
        $seafood = products::where('category', '=','SeaFood')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('product_name','like', '%' . request('searchElement') . '%')->take(12)->get();
        $productnames = products::select('product_name')->orderBy('views', 'DESC')->get();
        return view('User.specificItem',compact(['species','seafood','products','productnames']));
    }

}
