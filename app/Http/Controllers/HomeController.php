<?php

namespace App\Http\Controllers;
use App\web;

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
        //
        return view('User.home');
    }

    public function redirect(){
        $web = web::all();
        return view('User.singleItem',compact('web'));
    }
}
