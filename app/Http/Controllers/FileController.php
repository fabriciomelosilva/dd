<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($filePath)
    {

    //$pdfContent = storage_path('app/TheThreeMusketeers.pdf');

    $pdfContent = storage_path('app/'.$filePath);

    return \Response::file($pdfContent);

    }
}
