<?php

namespace App\Http\Controllers;
use App\Edicao;


use Illuminate\Http\Request;

class AssinanteController extends Controller
{

    public function index()
    {  

        date_default_timezone_set("America/Fortaleza");
        $dateNow = getdate();

        $mounth = $dateNow['mon'];
        $year = $dateNow['year'];

        $edicao_ano = \DB::table('edicaos')->select('ed_year')->groupBy('ed_year')->orderBy('ed_year', 'desc')->get();
            
            $menu = array();
            foreach($edicao_ano as $ano){
                $edicao_mes = \DB::table('edicaos')->select('ed_mounth')->groupBy('ed_mounth')->where('ed_year', $ano->ed_year)->get();
                foreach($edicao_mes as $mes){
                     $menu[$ano->ed_year][] = $mes->ed_mounth;
                }
            }

            $edicao = $this->getEditions($mounth, $year);
            
            return view("assinante.index", compact('menu','edicao' ));
    }


    public function getEditions($mounth, $year){

        $edicao = \DB::table('edicaos')->orderBy('ed_year', 'desc')->orderBy('ed_mounth', 'desc')->orderBy('ed_day', 'desc')->where('ed_year', $year)->where('ed_mounth', $mounth)->where('ed_status', '1')->paginate(12);

       return $edicao;

    }
}
