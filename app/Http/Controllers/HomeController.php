<?php

namespace App\Http\Controllers;
use App\web;
use App\products;
use Illuminate\Http\Request;

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
        return view('User.home',compact(['species','seafood','products']));
    }

    public function SpeciesPage(){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);

        $species = products::where('category', '=','Species')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=','Species')->orderBy('views', 'ASC')->take(5)->get();
        return view('User.SpeciesHomePage',compact(['species','products']));
    }
    //load more function 
    public function SpeciesPageLoadMore(Request $request){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);
        
        $species = products::where('category', '=','Species')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=','Species')->orderBy('views', 'ASC')->take(request('totalProducts')+5)->get();
        return view('User.SpeciesHomePage',compact(['species','products']));
    }
    public function SeafoodPage(){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);
        
        $SeaFood = products::where('category', '=','SeaFood')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=','SeaFood')->orderBy('views', 'ASC')->take(5)->get();
        return view('User.SeafoodHomePage',compact(['SeaFood','products']));
    }
    //load more function 
    public function SeafoodPageLoadMore(Request $request){
        //storing link
        $currentLink = request()->path();
        session(['googleLoginBeforeLink' => $currentLink]);
        
        $SeaFood = products::where('category', '=','SeaFood')->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=','SeaFood')->orderBy('views', 'ASC')->take(request('totalProducts')+5)->get();
        return view('User.SeafoodHomePage',compact(['SeaFood','products']));
    }

}
