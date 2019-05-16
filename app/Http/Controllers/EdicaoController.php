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
        $this->validate($request,["data_edicao"=>"required"],["data_edicao.required" => "O campo data é obrigatório!"]); 
        $pdf = new \PdfMerger;
        $cont = 0;
        $data_edicao = $request->input('data_edicao');

		$data_edicao = explode('/', $data_edicao);
	
        $day    = $data_edicao[0];
        $month  = $data_edicao[1];
        $year   = $data_edicao[2];

        $data_edicao_string = $year .'-'. $month .'-'. $day;

        $findEdicao = Edicao::where('ed_year', $year)->where('ed_month', $month)->where('ed_day', $day)->first();        

        if (!$findEdicao){     

            if ($request->hasFile('edicao')){
                $files = $request->file('edicao');
                
                $cont = 0;
                $qtdFiles = count($files);

                foreach ($files as $key => $file) {
                    $file = $request->edicao;
                    $caderno = $file[$key];
                    $tempPdf = $caderno->store('pdfs');
                    $removePdf[] = $tempPdf;
                    $cont++;

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
                    
                        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                        //windows
                            $output = shell_exec('gswin64c -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                        }else{
                        //unix
                            $output = shell_exec('/usr/bin/gs -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                        }
                    }
                    
                    if ($cont == $qtdFiles){
                        $pdfFinal = "ed_".$day."_".uniqid();

                        $pdf->merge('file', storage_path("app/edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf"));

                        foreach($removePdf as $pdf){
                            unlink(storage_path('app/'.$pdf));
                        }
                        
                        $this->edicao->ed_year = $year;
                        $this->edicao->ed_month = $month;
                        $this->edicao->ed_day = $day;
                        $this->edicao->ed_date = $data_edicao_string;
                        $this->edicao->ed_file_name = $pdfFinal.".pdf";
                        $this->edicao->ed_status = 0; // Em Rascunho
                        $this->edicao->ed_capa = $capa.".jpg";
                        $this->edicao->url = "edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf";

                        $this->edicao->save();

                        return redirect()->route('edicaoGet')->with('sucess.message', "Edição de $day / $month / $year criada!");
                    }
                }
            }
        }else{
            return redirect()->route('edicaoGet')->with('error.message', 'Edição deste dia já existe!');
        }   
    }

    public function listEdicao()
    {
        $edicao = Edicao::orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')->paginate(8);
        return view('admin.pages.edicaolist', compact('edicao'));
    }

    public function editEdicaoGet(Edicao $edicao){
        return view("admin.pages.edicaoedit", compact('edicao'));
    }

    public function update(Request $request, $id){
        $pdf = new \PdfMerger;
        $edicao = Edicao::findOrFail($id);
        $cont = 0;
        $data_edicao = $request->input('data_edicao');
        $data_edicao = explode('/', $data_edicao);
        $day    = $data_edicao[0];
        $month  = $data_edicao[1];
        $year   = $data_edicao[2];

        $data_edicao_string = $year .'-'. $month .'-'. $day;

        $findEdicao = Edicao::where('ed_year', $year)->where('ed_month', $month)->where('ed_day', $day)->first();   
        
        $data_atual =  $edicao->ed_year.$edicao->ed_month.$edicao->ed_day;
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
                    $removePdf[] = $tempPdf;

                    $cont++;

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

                        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                        //windows
                            $output = shell_exec('gswin64c -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                        }else{
                        //unix
                            $output = shell_exec('/usr/bin/gs -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                        }
                    }
        
                    if ($cont == $qtdFiles){
                        $pdfFinal = "ed_".$day."_".uniqid();
                    
                        $pdf->merge('file', storage_path("app/edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf"));

                        foreach($removePdf as $pdf){
                            unlink(storage_path('app/'.$pdf));
                        }

                        $edicao->ed_year = $year;
                        $edicao->ed_month = $month;
                        $edicao->ed_day = $day;
                        $edicao->ed_date = $data_edicao_string;
                        $edicao->ed_file_name = $pdfFinal.".pdf";
                        $edicao->ed_status = 0;
                        $edicao->ed_capa = $capa.".jpg";
                        $edicao->url = "edicao/".$year."/".$month."/".$day."/".$pdfFinal.".pdf";

                        $edicao->update();

                        return redirect()->route('lista_edicao')->with('sucess.message', 'Edição atualizada!');
                    }
                }
            }
        }else{
            return redirect()->route('editarEdicaoGet',[$edicao])->with('error.message', 'Edição já existe! Data selecionada ocupada.');
        }
    }

    public function alterarStatus(Request $request, $id){
        $status = $request->input('status');
        $edicao = Edicao::findOrFail($id);
        $edicao->ed_status = $status;

        if ($edicao->ed_status == "1"){

            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                //windows
                $output = shell_exec('gswin64c -sDEVICE=pdfwrite -dNOPAUSE -dQUIET -dBATCH -dCompressFonts=true -dUseCIEColor -r2 -dAutoRotatePages=/None -sOutputFile='.storage_path("app/edicao/".$edicao->ed_year."/".$edicao->ed_month."/".$edicao->ed_day."/"."compress_".$edicao->ed_file_name." ").storage_path("app/edicao/".$edicao->ed_year."/".$edicao->ed_month."/".$edicao->ed_day."/"."$edicao->ed_file_name"));
                $edicao->ed_file_name = "compress_".$edicao->ed_file_name;
                $edicao->url = "edicao/".$edicao->ed_year."/".$edicao->ed_month."/".$edicao->ed_day."/"."compress_".$edicao->ed_file_name;
        
            }else{
                //unix
                $output = shell_exec('/usr/bin/gs -sDEVICE=pdfwrite -dNOPAUSE -dQUIET -dBATCH -dCompressFonts=true -dUseCIEColor -r2 -dAutoRotatePages=/None -sOutputFile='.storage_path("app/edicao/".$edicao->ed_year."/".$edicao->ed_month."/".$edicao->ed_day."/"."compress_".$edicao->ed_file_name." ").storage_path("app/edicao/".$edicao->ed_year."/".$edicao->ed_month."/".$edicao->ed_day."/"."$edicao->ed_file_name"));
                $edicao->ed_file_name = "compress_".$edicao->ed_file_name;
                $edicao->url = "edicao/".$edicao->ed_year."/".$edicao->ed_month."/".$edicao->ed_day."/".$edicao->ed_file_name;
            }     
        }
       
        $edicao->update();
        return redirect()->route('lista_edicao');
    }
}