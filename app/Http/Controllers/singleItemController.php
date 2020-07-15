<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\web;
use App\products;

class singleItemController extends Controller
{
    //
    public function index($category,$prod_id)
    {
        //
        $ItemCategoryTrending = products::where('category', '=',$category)->orderBy('prod_id', 'DESC')->take(12)->get();
        $products = products::where('category', '=',$category)->orderBy('views', 'ASC')->take(10)->get();
        $selectedItem = products::where('prod_id', '=',$prod_id)->get();
        return view('User.singleItem',compact(['ItemCategoryTrending','products','category','selectedItem']));
    }
}
