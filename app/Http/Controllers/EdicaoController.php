<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edicao;


class EdicaoController extends Controller
{

    private $edicao;

    function __construct(){
        $this->edicao = new Edicao();
    }
    
    public function cadastroEdicaoGet(){
        return view("admin.pages.edicao");
    } 

    public function store (Request $request){
        
        $this->validate($request,[
            "data_edicao"=>"required"
        ],[
            "data_edicao.required" => "O campo data é obrigatório!"
        ]);
        
        $pdf = new \PdfMerger;
        
        $cont = 0;
        $data_edicao = $request->input('data_edicao');

		$data_edicao = explode('/', $data_edicao);
	
        $day    = $data_edicao[0];
        $month  = $data_edicao[1];
        $year   = $data_edicao[2];

        $findEdicao = Edicao::where('ed_year', $year)->where('ed_mounth', $month)->where('ed_day', $day)->first();        

        if (!$findEdicao){     

            if ($request->hasFile('edicao')){
                $files = $request->file('edicao');
                
                $cont = 0;
                $qtdFiles = count($files);

                foreach ($files as $key => $file) {
                    $file = $request->edicao;
                    $caderno = $file[$key];
                    $tempPdf = $caderno->store('pdfs');
                    $cont++;
                
                    //$output = shell_exec('gswin64c -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile='.storage_path("app/pdfs/".$cont.".pdf ").storage_path("app/".$tempPdf));
        
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
                    if ($cont == 1){
                        $capa = "capa_".uniqid();
                        $output =  shell_exec('gswin64c -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                    }
                    if ($cont == $qtdFiles){
                        $pdfFinal = "ed_".$day."_".uniqid();
                    
                        $pdf->merge('file', storage_path("app/edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf"));

                        $this->edicao->ed_year = $year;
                        $this->edicao->ed_mounth = $month;
                        $this->edicao->ed_day = $day;
                        $this->edicao->ed_file_name = $pdfFinal.".pdf";
                        $this->edicao->ed_status = 0;
                        $this->edicao->ed_capa = $capa.".jpg";
                        $this->edicao->url = "edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf";

                        $this->edicao->save();

                        return redirect()->route('edicaoGet')->with('flash.message', 'Edição criada!')->with('flash.class', 'success');

                    }
                }
            }
        }else{
            return redirect()->route('edicaoGet')->with('flash.message', 'Edição já existe!')->with('flash.class', 'danger');
        }   
    } 

    public function listEdicao()
    {
        $edicao = Edicao::orderBy('ed_year', 'desc')->orderBy('ed_mounth', 'desc')->orderBy('ed_day', 'desc')->paginate(8);
        
        return view('admin.pages.edicaolist', compact('edicao'));
    }
    
    public function listFront(Request $request)
    {
        $year   = $request->input('year');
        $mounth = $request->input('mounth');
        $day    = $request->input('day');
        $file_name    = $request->input('file_name');
            
        return view("flip-page.front", compact('year','mounth','day','file_name'));

    }

    public function editEdicaoGet(Edicao $edicao){
        return view("admin.pages.edicaoedit", compact('edicao'));
    } 

    public function alterarStatus(Request $request, $id){

        $status = $request->input('status');
        $edicao = Edicao::findOrFail($id);
        $edicao->ed_status = $status;
        $edicao->save();
        return redirect()->route('lista_edicao');

    }

    public function update (Request $request, $id){

        $pdf = new \PdfMerger;
        $edicao = Edicao::findOrFail($id);
        $cont = 0;
        $data_edicao = $request->input('data_edicao');
        $data_edicao = explode('/', $data_edicao);
        $day    = $data_edicao[0];
        $month  = $data_edicao[1];
        $year   = $data_edicao[2];

        $findEdicao = Edicao::where('ed_year', $year)->where('ed_mounth', $month)->where('ed_day', $day)->first();   
        
        $data_atual =  $edicao->ed_year.$edicao->ed_mounth.$edicao->ed_day;
        $new_data = $year.$month.$day;

        if (!$findEdicao || ($new_data == $data_atual)){     

        if ($request->hasFile('edicao')){
            $files = $request->file('edicao');
            
            $cont = 0;
            $qtdFiles = count($files);

            foreach ($files as $key => $file) {
                $file = $request->edicao;
                $caderno = $file[$key];
                $tempPdf = $caderno->store('pdfs');
                $cont++;

                //$output = shell_exec('gswin64c -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile='.storage_path("app/pdfs/".$cont.".pdf ").storage_path("app/".$tempPdf));
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
    
                if ($cont == 1){
                    $capa = "capa_".uniqid();
                    $output =  shell_exec('gswin64c -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                }
    
                if ($cont == $qtdFiles){
                    $pdfFinal = "ed_".$day."_".uniqid();
                  
                    $pdf->merge('file', storage_path("app/edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf"));

                    $edicao->ed_year = $year;
                    $edicao->ed_mounth = $month;
                    $edicao->ed_day = $day;
                    $edicao->ed_file_name = $pdfFinal.".pdf";
                    $edicao->ed_status = 0;
                    $edicao->ed_capa = $capa.".jpg";
                    $edicao->url = "edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf";

                    $edicao->update();

                    return redirect()->route('editarEdicaoGet',[$edicao])->with('flash.message', 'Edição atualizada!')->with('flash.class', 'success');;

                }
            }
        }   
    
    }else{
        return redirect()->route('editarEdicaoGet',[$edicao])->with('flash.message', 'Edição já existe!')->with('flash.class', 'danger');
    }
    }
}
