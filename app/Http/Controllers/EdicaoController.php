<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edicao;


class EdicaoController extends Controller
{
    public function cadastroEdicaoGet(){
        return view("admin.pages.edicao");
    } 

    public function store (Request $request){
        $this->validate($request,[
            "edicao"=>"required"
        ],[
            "edicao.required" => "PDF é obrigatório!"
        ]);
        
        $pdf = new \PDFMerger;
        $edicao = new Edicao();

        $cont = 0;

        $data_edicao = $request->input('data_edicao');
        
        $data_edicao = explode('/', $data_edicao);
        $day    = $data_edicao[0];
        $month  = $data_edicao[1];
        $year   = $data_edicao[2];

        if ($request->hasFile('edicao')){
            $files = $request->file('edicao');
            
            $cont = 0;
            $qtdFiles = count($files);

            foreach ($files as $key => $file) {
                $file = $request->edicao;
                $caderno = $file[$key];
                $tempPdf = $caderno->store('pdfs');
                $cont++;

                //$output = shell_exec('gswin64c -sDE,VICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile='.storage_path("app/pdfs/".$cont.".pdf ").storage_path("app/".$tempPdf));
                //$pdf->addPDF(storage_path("app/pdfs/".$cont.".pdf"));

                $pdf->addPDF(storage_path("app/".$tempPdf));

                if(!\File::exists(storage_path("app/edicao/".$year))) {
                    \File::makeDirectory(storage_path("app/edicao/".$year));
                }
                if(!\File::exists(storage_path("app/edicao/".$year."/".$month))) {
                    \File::makeDirectory(storage_path("app/edicao/".$year."/".$month));
                }
                if(!\File::exists(storage_path("app/edicao/".$year."/".$month."/".$day))) {
                    \File::makeDirectory(storage_path("app/edicao/".$year."/".$month."/".$day));
                }             
    
                if ($cont == $qtdFiles){
                    $pdfFinal = "ed_".$day."_".uniqid();
                  
                    $pdf->merge('file', storage_path("app/edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf"));

                    $edicao->ed_year = $year;
                    $edicao->ed_mounth = $month;
                    $edicao->ed_day = $day;
                    $edicao->ed_status = 0;

                    $edicao->url = "edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf";

                    $edicao->save();

                    return redirect()->route('edicaoGet')->with('flash.message', 'Edição criada!')->with('flash.class', 'success');;

                }
            }
        }    
    } 

    public function listEdicao()
    {
        $edicao = Edicao::orderBy('ed_year', 'desc')->simplePaginate(3);
        
        return view('admin.pages.edicaolist', compact('edicao'));
    }
    
    public function listFront(Request $request)
    {
        $year   = $request->input('year');
        $mounth = $request->input('mounth');
        $day    = $request->input('day');
            
        return view("front.front", compact('year','mounth','day'));

    }
    
}
