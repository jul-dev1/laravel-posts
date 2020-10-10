<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth')->only("test");
    }



    public function index(){
        return view('pages.index');
    }
    public function about(){
        $about="About";
        return view('pages.about', compact('about'));
    }
    public function services(){
        $data=array(
            'tittle'=>'Services',
            'services'=>['Sell new Car','Sell used Car']
        );
        // dd($data);
        return view('pages.services')->with($data);
    }

   
    

   

    
    

}
