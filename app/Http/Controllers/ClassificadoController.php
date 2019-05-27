<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classificado;

class ClassificadoController extends Controller
{
    private $classificado;

    function __construct(){
        $this->classificado = new Classificado();
    }
    
    public function cadastroClassificadoGet(){
        return view("admin.pages.classificado");
    }

    public function store (Request $request){
        $this->validate($request,["data_classificado"=>"required"],["data_classificado.required" => "O campo data é obrigatório!"]); 
        $pdf = new \PdfMerger;
        $cont = 0;
        $data_classificado = $request->input('data_classificado');

		$data_classificado = explode('/', $data_classificado);
	
        $day    = $data_classificado[0];
        $month  = $data_classificado[1];
        $year   = $data_classificado[2];

        $data_classificado_string = $year .'-'. $month .'-'. $day;

        $findClassificado = Classificado::where('ed_year', $year)->where('ed_month', $month)->where('ed_day', $day)->first();        

        if (!$findClassificado){    

            if ($request->hasFile('classificado')){
                $files = $request->file('classificado');
                
                $cont = 0;
                $qtdFiles = count($files);

                foreach ($files as $key => $file) {
                    $file = $request->classificado;
                    $caderno = $file[$key];
                    $tempPdf = $caderno->store('pdfs');
                    $removePdf[] = $tempPdf;
                    $cont++;

                    $pdf->addPDF(storage_path("app/".$tempPdf));

                    if(!\File::exists(storage_path("app/classificado"))) {
                        \File::makeDirectory(storage_path("app/classificado"));
                    }
                    if(!\File::exists(storage_path("app/classificado/".$year))) {
                        \File::makeDirectory(storage_path("app/classificado/".$year));
                    }
                    if(!\File::exists(storage_path("app/classificado/".$year."/".$month))) {
                        \File::makeDirectory(storage_path("app/classificado/".$year."/".$month));
                    }
                    if(!\File::exists(storage_path("app/classificado/".$year."/".$month."/".$day))) {
                        \File::makeDirectory(storage_path("app/classificado/".$year."/".$month."/".$day));
                    }             
                    if ($cont == 1){
                        $capa = "capa_".uniqid();
                    
                        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                        //windows
                            $output = shell_exec('gswin64c -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/classificado/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                        }else{
                        //unix
                            $output = shell_exec('/usr/bin/gs -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/classificado/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                        }
                    }
                    
                    if ($cont == $qtdFiles){
                        $pdfFinal = "ed_".$day."_".uniqid();

                        $pdf->merge('file', storage_path("app/classificado/".$year."/".$month."/".$day."/".$pdfFinal.".pdf"));

                        foreach($removePdf as $pdf){
                            unlink(storage_path('app/'.$pdf));
                        }
                        
                        $this->classificado->ed_year = $year;
                        $this->classificado->ed_month = $month;
                        $this->classificado->ed_day = $day;
                        $this->classificado->ed_date = $data_classificado_string;
                        $this->classificado->ed_file_name = $pdfFinal.".pdf";
                        $this->classificado->ed_status = 0; // Em Rascunho
                        $this->classificado->ed_capa = $capa.".jpg";
                        $this->classificado->url = "classificado/".$year."/".$month."/".$day."/".$pdfFinal.".pdf";

                        $this->classificado->save();

                        return redirect()->route('classificadoGet')->with('sucess.message', "Edição de $day / $month / $year criada!");
                    }
                }
            }
        }else{
            return redirect()->route('classificadoGet')->with('error.message', 'Edição deste dia já existe!');
        }   
    } 

    public function listClassificado()
    {
        $classificado = classificado::orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')->paginate(8);
        return view('admin.pages.classificadolist', compact('classificado'));
    }
    
    public function editClassificadoGet(Classificado $classificado){
        return view("admin.pages.classificadoedit", compact('classificado'));
    }

    public function update(Request $request, $id){
        $pdf = new \PdfMerger;
        $classificado = Classificado::findOrFail($id);
        $cont = 0;
        $data_classificado = $request->input('data_classificado');
        $data_classificado = explode('/', $data_classificado);
        $day    = $data_classificado[0];
        $month  = $data_classificado[1];
        $year   = $data_classificado[2];

        $data_classificado_string = $year .'-'. $month .'-'. $day;

        $findClassificado = Classificado::where('ed_year', $year)->where('ed_month', $month)->where('ed_day', $day)->first();   
        
        $data_atual =  $classificado->ed_year.$classificado->ed_month.$classificado->ed_day;
        $new_data = $year.$month.$day;

        if (!$findClassificado || ($new_data == $data_atual)){   

            if ($request->hasFile('classificado')){
                $files = $request->file('classificado');
                
                $cont = 0;
                $qtdFiles = count($files);

                foreach ($files as $key => $file) {
                    $file = $request->classificado;
                    $caderno = $file[$key];
                    $tempPdf = $caderno->store('pdfs');
                    $removePdf[] = $tempPdf;

                    $cont++;

                    $pdf->addPDF(storage_path("app/".$tempPdf));

                    if(!\File::exists(storage_path("app/classificado/".$year))) {
                        \File::makeDirectory(storage_path("app/classificado/".$year));
                    }
                    if(!\File::exists(storage_path("app/classificado/".$year."/".$month))) {
                        \File::makeDirectory(storage_path("app/classificado/".$year."/".$month));
                    }
                    if(!\File::exists(storage_path("app/classificado/".$year."/".$month."/".$day))) {
                        \File::makeDirectory(storage_path("app/classificado/".$year."/".$month."/".$day));
                    }
        
                    if ($cont == 1){
                        $capa = "capa_".uniqid();

                        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                        //windows
                            $output = shell_exec('gswin64c -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/classificado/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                        }else{
                        //unix
                            $output = shell_exec('/usr/bin/gs -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/classificado/".$year."/".$month."/".$day."/".$capa.".jpg ").storage_path("app/".$tempPdf));
                        }
                    }
        
                    if ($cont == $qtdFiles){
                        $pdfFinal = "ed_".$day."_".uniqid();
                    
                        $pdf->merge('file', storage_path("app/classificado/".$year."/".$month."/".$day."/".$pdfFinal.".pdf"));

                        foreach($removePdf as $pdf){
                            unlink(storage_path('app/'.$pdf));
                        }

                        $classificado->ed_year = $year;
                        $classificado->ed_month = $month;
                        $classificado->ed_day = $day;
                        $classificado->ed_date = $data_classificado_string;
                        $classificado->ed_file_name = $pdfFinal.".pdf";
                        $classificado->ed_status = 0;
                        $classificado->ed_capa = $capa.".jpg";
                        $classificado->url = "classificado/".$year."/".$month."/".$day."/".$pdfFinal.".pdf";

                        $classificado->update();

                        return redirect()->route('lista_classificado')->with('sucess.message', 'Edição atualizada!');
                    }
                }
            }
        }else{
            return redirect()->route('editarClassificadoGet',[$classificado])->with('error.message', 'Edição já existe! Data selecionada ocupada.');
        }
    }

    public function alterarStatus(Request $request, $id){
        $status = $request->input('status');
        $classificado = Classificado::findOrFail($id);
        $classificado->ed_status = $status;

        if ($classificado->ed_status == "1"){

            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                //windows
                $output = shell_exec('gswin64c -sDEVICE=pdfwrite -dNOPAUSE -dQUIET -dBATCH -dCompressFonts=true -dUseCIEColor -r20 -dAutoRotatePages=/None -sOutputFile='.storage_path("app/classificado/".$classificado->ed_year."/".$classificado->ed_month."/".$classificado->ed_day."/"."compress_".$classificado->ed_file_name." ").storage_path("app/classificado/".$classificado->ed_year."/".$classificado->ed_month."/".$classificado->ed_day."/"."$classificado->ed_file_name"));
                $classificado->ed_file_name = "compress_".$classificado->ed_file_name;
                $classificado->url = "classificado/".$classificado->ed_year."/".$classificado->ed_month."/".$classificado->ed_day."/"."compress_".$classificado->ed_file_name;
        
            }else{
                //unix
                $output = shell_exec('/usr/bin/gs -sDEVICE=pdfwrite -dNOPAUSE -dQUIET -dBATCH -dCompressFonts=true -dUseCIEColor -r20 -dAutoRotatePages=/None -sOutputFile='.storage_path("app/classificado/".$classificado->ed_year."/".$classificado->ed_month."/".$classificado->ed_day."/"."compress_".$classificado->ed_file_name." ").storage_path("app/classificado/".$classificado->ed_year."/".$classificado->ed_month."/".$classificado->ed_day."/"."$classificado->ed_file_name"));
                $classificado->ed_file_name = "compress_".$classificado->ed_file_name;
                $classificado->url = "classificado/".$classificado->ed_year."/".$classificado->ed_month."/".$classificado->ed_day."/".$classificado->ed_file_name;
            }     
        }
       
        $classificado->update();
        return redirect()->route('lista_classificado');
    }
}