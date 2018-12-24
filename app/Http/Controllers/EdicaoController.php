<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdicaoController extends Controller
{
    public function cadastroEdicaoGet(){
        return view("admin.pages.edicao");
    } 

    public function cadastroEdicaoPost(Request $request){
        $this->validate($request,[
            "edicao"=>"required"
        ],[
            "edicao.required" => "PDF é obrigatório!"
        ]);
        
        $pdf = new \PDFMerger;
        $cont = 0;

        if ($request->hasFile('edicao')){
            $files = $request->file('edicao');
            $cont = 0;
            $qtdFiles = count($files);

            foreach ($files as $key => $file) {
                $file = $request->edicao;
                $caderno = $file[$key];
                $tempPdf = $caderno->store('pdfs');
                $cont++;

                $output = shell_exec('gswin64c -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile='.storage_path("app/pdfs/".$cont.".pdf ").storage_path("app/".$tempPdf));

                $pdf->addPDF(storage_path("app/pdfs/".$cont.".pdf"));

                if ($cont == $qtdFiles){
                    $pdfFinal = uniqid();
                    $pdf->merge('file', storage_path("app/pdfsmerge/".$pdfFinal.".pdf"));    
                }
            }

            var_dump($pdf);

        }    
    } 
}
