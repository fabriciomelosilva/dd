<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Edicao;
use Illuminate\Support\Facades\Storage;

class TransferFilesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TransferFilesCommand {diretorio} {ano?} {mes?} {dia?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transferir arquivos para a Base de Dados interna';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set('memory_limit', '1024M');

        $dir = $this->argument('diretorio'); // 'C:\Users\610782341\Documents\pdfs';

        $nameCapa1 = "PRIMEIRA";
        $nameCapa2 = "PAGINA";
        $nameCapa2018 = "NLVL-01";

        $nameRemove = "CLASSIFICADOS";

        $ano = ($this->argument('ano'))? $this->argument('ano') : date("Y");
        $mesSelc = ($this->argument('mes'))? $this->argument('mes') : null;
        $diaSelc = ($this->argument('dia'))? $this->argument('dia') : null;

        $this->info('********* Diario Digital *********');
        $this->info('Trasferencia de Dados iniciada...');
        $this->info('');

        if($ano < 2010)
            $this->info('Antes de 2010');
        else
            $this->info('Depois de 2010');

        if(\File::exists( $dir )){
            $this->info('Diretorio Existe '.$dir);
        }else{
            $this->error('Diretorio Não Existe '.$dir);
            return 0;
        }

        $mesLoop = $this->loopMes($mesSelc);
        $diaLoop = $this->loopDia($diaSelc);

        for($mes = $mesLoop['ini']; $mes <= $mesLoop['fim']; $mes++){
            if($mes < 10){
                $mesTxt = '0'.$mes;
            }else{
                $mesTxt = $mes;
            }

            for($dia = $diaLoop['ini']; $dia <= $diaLoop['fim']; $dia++){
                if($dia < 10){
                    $diaTxt = '0'.$dia;
                }else{
                    $diaTxt = $dia;
                }

                $dirPdf = $dir."\\".$ano.$mesTxt.$diaTxt;

                if(\File::exists( $dirPdf )){
                    $this->info('Diretorio Existe '.$dirPdf);

                    $files = \File::allFiles( $dirPdf );
                    $this->info('Diretorio Possui '.count($files).' elementos');

                    if(count($files) > 0){
                        $findEdicao = Edicao::where('ed_year', $ano)->where('ed_month', $mes)->where('ed_day', $dia)->first();

                        if (!$findEdicao){
                            
                            if(!\File::exists(storage_path("app/edicao/".$ano))) {
                                \File::makeDirectory(storage_path("app/edicao/".$ano));
                            }
                            if(!\File::exists(storage_path("app/edicao/".$ano."/".$mes))) {
                                \File::makeDirectory(storage_path("app/edicao/".$ano."/".$mes));
                            }
                            if(!\File::exists(storage_path("app/edicao/".$ano."/".$mes."/".$dia))) {
                                \File::makeDirectory(storage_path("app/edicao/".$ano."/".$mes."/".$dia));
                            }
                            if(!\File::exists(storage_path("app/edicao/".$ano."/".$mes."/".$dia."/compress"))) {
                                \File::makeDirectory(storage_path("app/edicao/".$ano."/".$mes."/".$dia."/compress"));
                            }
                            
                            $pdf = new \PdfMerger;
                            
                            $this->info("Compressao de Arquivos");
                            foreach ($files as $file) {
                                $caminhoPdf = str_replace("/", "\\", $file);
                                
                                $this->info($file->getBasename());

                                $capaAntiga = strpos($file->getBasename(), $nameCapa1);
                                $capaNova = strpos($file->getBasename(), $nameCapa2);
                                $capa2018 = strpos($file->getBasename(), $nameCapa2018);

                                $classificado = strpos($file->getBasename(), $nameRemove);

                                if($classificado == false){
                                    if($capaAntiga == false && $capaNova == false && $capa2018 == false){
                                        $namePdf = "compress_".$file->getBasename();
                                    }else{
                                        $namePdf = "capa_compress_".$file->getBasename();
                                    }

                                    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                                        //windows
                                        if($ano < 2010)
                                            shell_exec('gswin64c -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook -dNOPAUSE -dQUIET -dBATCH -dAutoRotatePages=/None -r20 -dNOSUBSTDEVICECOLORS -sOutputFile='.storage_path("app/edicao/".$ano."/".$mes."/".$dia."/compress/".$namePdf)." ".$caminhoPdf);
                                        else
                                            shell_exec('gswin64c -sDEVICE=pdfwrite -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -dCompressFonts=true -dUseCIEColor -r20 -dAutoRotatePages=/None -sOutputFile='.storage_path("app/edicao/".$ano."/".$mes."/".$dia."/compress/".$namePdf)." ".$caminhoPdf);

                                //-sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook -dNOPAUSE -dQUIET -dBATCH -dAutoRotatePages=/None -r50 -dNOSUBSTDEVICECOLORS
                                        // 5.602
                                        // 1.198
                                        // 10.004

                                //-sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook -dNOPAUSE -dQUIET -dBATCH -dAutoRotatePages=/None -r50 
                                        // 1.198
                                        // 10.004

                                //-sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook -dNOPAUSE -dQUIET -dBATCH -dAutoRotatePages=/None
                                        // 1.198
                                        // 10.008--dPDFSETTINGS=/ebook 

                                //-sDEVICE=pdfwrite -dPDFSETTINGS=/ebook -dNOPAUSE -dQUIET -dBATCH -dCompressFonts=true -dUseCIEColor -r2 -dAutoRotatePages=/None -sOutputFile=

                                //-sDEVICE=pdfwrite -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -dCompressFonts=true -dUseCIEColor -r256 -dAutoRotatePages=/None
                                    }else{
                                        //unix
                                        shell_exec('/usr/bin/gs -sDEVICE=pdfwrite -dNOPAUSE -dQUIET -dBATCH -dCompressFonts=true -dUseCIEColor -r20 -dAutoRotatePages=/None -sOutputFile='.storage_path("app/edicao/".$ano."/".$mes."/".$dia."/compress/".$namePdf)." ".$caminhoPdf);
                                    }
                                }
                            }

                            $files = \File::allFiles( storage_path("app/edicao/".$ano."/".$mes."/".$dia."/compress") );

                            $this->info("Uniao de Arquivos - Criacao da Edicao");
                            foreach ($files as $file) {
                                $caminhoPdf = str_replace("\\", "/", $file);
                                
                                $pdf->addPDF($caminhoPdf);

                                if ($file === reset($files)) {
                                    $capa = "capa_".uniqid();
                                
                                    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                                    //windows
                                        $output = shell_exec('gswin64c -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$ano."/".$mes."/".$dia."/".$capa.".jpg")." ".$caminhoPdf);
                                    }else{
                                    //unix
                                        $output = shell_exec('/usr/bin/gs -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$ano."/".$mes."/".$dia."/".$capa.".jpg")." ".$caminhoPdf);
                                    }
                                }
                             
                                if ($file === end($files)) {
                                    $pdfFinal = "ed_".$dia."_".uniqid();

                                    $pdf->merge('file', storage_path("app/edicao/".$ano."/".$mes."/".$dia."/".$pdfFinal.".pdf"));

                                    $data_edicao_string = $ano .'-'. $mes .'-'. $dia;
                                    
                                    $edicao = new Edicao();
                                    $edicao->ed_year = $ano;
                                    $edicao->ed_month = $mes;
                                    $edicao->ed_day = $dia;
                                    $edicao->ed_date = $data_edicao_string;
                                    $edicao->ed_file_name = $pdfFinal.".pdf";
                                    $edicao->ed_status = 1;
                                    $edicao->ed_capa = $capa.".jpg";
                                    $edicao->url = "edicao/".$ano."/".$mes."/".$dia."/".$pdfFinal.".pdf";

                                    $edicao->save();

                                    $this->info('Edição Criada! '.$data_edicao_string);
                                }
                            }
                        }else{
                            $this->error('Edição deste dia já existe! '.$dirPdf);
                        }
                    }else{
                        $this->error('Diretorio não possui Arquivos! '.$dirPdf);
                    }
                }else{
                    $this->error('Diretorio Não Existe '.$dirPdf);
                }
            }
        }

        $this->info('');
        $this->info('********* Diario Digital *********');
    }

    private function loopMes($mes){
        if ($mes == null){
            return [ 'ini' => 1, 'fim' => 12];
        }else{
            return [ 'ini' => (int)$mes, 'fim' => (int)$mes];
        }
    }

    private function loopDia($dia){
        if ($dia == null){
            return [ 'ini' => 1, 'fim' => 31];
        }else{
            return [ 'ini' => (int)$dia, 'fim' => (int)$dia];
        }
    }
}