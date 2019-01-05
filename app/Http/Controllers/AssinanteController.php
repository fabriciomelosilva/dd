<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssinanteController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:assinante');
    }*/


    public function index()
    {
        //return view('admin.home');
        return "Área do Assinante";
    }
}
