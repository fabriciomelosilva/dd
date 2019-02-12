<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($p1,$p2,$p3,$p4)
    {

    //$pdfContent = storage_path('app/TheThreeMusketeers.pdf');
    
    $pdfContent = storage_path("app/edicao/".$p1."/".$p2."/".$p3."/".$p4);

    return \Response::file($pdfContent);

    }

    public function showCapa($p1,$p2,$p3,$p4)
    {

    //$pdfContent = storage_path('app/TheThreeMusketeers.pdf');
    
    $pdfContent = storage_path("app/edicao/".$p1."/".$p2."/".$p3."/".$p4);

    return \Response::file($pdfContent);

    }
}
