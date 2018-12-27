<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($p1,$p2,$p3,$p4,$p5,$p6)
    {

    //$pdfContent = storage_path('app/TheThreeMusketeers.pdf');
    
    $pdfContent = storage_path($p1."/".$p2."/".$p3."/".$p4."/".$p5."/".$p6);

    return \Response::file($pdfContent);

    }
}
