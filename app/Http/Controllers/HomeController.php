<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //Session::put('key', auth()->id());
      

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //echo auth()->id();
        $idUsuario=auth()->id();
        Session::put('idUsuario',$idUsuario);
        return view('home');
       // echo Session::get('key');
    }
}
