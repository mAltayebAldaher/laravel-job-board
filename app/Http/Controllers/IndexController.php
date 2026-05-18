<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller  
{
    public function __invoke(Request $request){
        return view('index',["pageTitle"=>"index taieb"]);
    }
    // function about(){
    //     return view('about', ["pageTitle"=>"about"]);
    // }
    // function contact(){
    //     return view('contact',['pageTitle'=>'contact']);
    // }
}
