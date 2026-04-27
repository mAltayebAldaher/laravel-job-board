<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    function index(){
        return view('index');
    }
    function about(){
        return view('about', ["pageTitle"=>"about"]);
    }
    function contact(){
        return view('contact',['pageTitle'=>'contact']);
    }
}
