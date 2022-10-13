<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
    * Abre a tela de home
    *
    * @return \Illuminate\Http\Response
    */
   public function index() 
   {
       return view('home');
   }
}
