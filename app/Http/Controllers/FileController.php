<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edicao;
use App\Classificado;

class FileController extends Controller
{
    public function show($p0,$p1,$p2,$p3,$p4)
    {
        /*$ano = (int) $p1;

        if($ano < 2019){
            if($p0 == "edicao"){
                $findEdicao = Edicao::where('ed_year', $p1)->where('ed_month', $p2)->where('ed_day', $p3)->first();

                $pdfContent = $findEdicao->url;
            }else{
                $findClassificado = Classificado::where('ed_year', $p1)->where('ed_month', $p2)->where('ed_day', $p3)->first();

                $pdfContent = $findClassificado->url;
            }
        }else{*/
            $pdfContent = storage_path("app/".$p0."/".$p1."/".$p2."/".$p3."/".$p4);
        //}

        return \Response::file($pdfContent);
    }
    
    public function toView(Request $request)
    {
        $year   = $request->input('year');
        $month  = $request->input('month');
        $day    = $request->input('day');
        $file_name    = $request->input('file_name');
        $type    = $request->input('type');
            
        return view("flip-page.front", compact('year','month','day','file_name','type'));
    }

    public function listFrontAssinante(Request $request)
    {
        $year   = $request->input('year');
        $month = $request->input('month');
        $day    = $request->input('day');
        $file_name    = $request->input('file_name');
            
        return view("flip-page-assinante.front", compact('year','month','day','file_name'));
    }

    public function sqlExport($year, $month){
        $year   = (int) $year;
        $month  = (int) $month;

        $edicoes = Edicao::where('ed_year', $year)->where('ed_month', $month)->get();
        $classificados = Classificado::where('ed_year', $year)->where('ed_month', $month)->get();

        $sql = "";

        foreach ($edicoes as $key => $value) {
            $sql .= 'INSERT INTO edicaos (ed_year, ed_month, ed_day, url, ed_status, ed_file_name, ed_capa, ed_date) VALUES ( '.$value->ed_year.', '.$value->ed_month.', '.$value->ed_day.', "'.$value->url.'", '.$value->ed_status.', "'.$value->ed_file_name.'", "'.$value->ed_capa.'", "'.$value->ed_date.'" );<br>';
        }

        foreach ($classificados as $key => $value) {
            $sql .= 'INSERT INTO classificados (ed_year, ed_month, ed_day, url, ed_status, ed_file_name, ed_capa, ed_date) VALUES ( '.$value->ed_year.', '.$value->ed_month.', '.$value->ed_day.', "'.$value->url.'", '.$value->ed_status.', "'.$value->ed_file_name.'", "'.$value->ed_capa.'", "'.$value->ed_date.'" );<br>';
        }

        return $sql;
    }
}