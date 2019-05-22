<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($p0,$p1,$p2,$p3,$p4)
    {

    //$pdfContent = storage_path('app/TheThreeMusketeers.pdf');
    
    $pdfContent = storage_path("app/".$p0."/".$p1."/".$p2."/".$p3."/".$p4);

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
}
