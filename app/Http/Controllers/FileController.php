<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($fileName)
    {

    //$pdfContent = storage_path('app/TheThreeMusketeers.pdf');

    $pdfContent = storage_path('app/'.$fileName);

    return \Response::file($pdfContent);

    }
}
