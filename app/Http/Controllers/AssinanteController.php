<?php

namespace App\Http\Controllers;
use App\Edicao;


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

        $menu = array();

        $edicao_ano = \DB::table('edicaos')
            ->select('ed_year')
            ->groupBy('ed_year')->get();
            

            $menu = array();
            foreach($edicao_ano as $ano){
                $edicao_mes = \DB::table('edicaos')->select('ed_mounth')->groupBy('ed_mounth')->where('ed_year', $ano->ed_year)->get();
                foreach($edicao_mes as $mes){
                     $menu[$ano->ed_year][] = $mes->ed_mounth;
                }
            }

            print_r($menu);
     

    }
}
