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
    protected $signature = 'TransferFilesCommand {diretorio} {publicacao} {edicao} {ano?} {mes?} {dia?}';

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
        $dir = $this->argument('diretorio'); // 'C:\Users\610782341\Documents\pdfs';
        $publicacao = $this->argument('publicacao');
        $edicaoTxt = $this->argument('edicao');

        $ano = ($this->argument('ano'))? $this->argument('ano') : date("Y");
        $mesSelc = ($this->argument('mes'))? $this->argument('mes') : null;
        $diaSelc = ($this->argument('dia'))? $this->argument('dia') : null;

        $this->info('********* Diario Digital *********');
        $this->info('Trasferencia de Dados iniciada...');
        $this->info('');

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

                    $filePDF = $dirPdf."\\".$ano.$mesTxt.$diaTxt."_".$publicacao."_".$edicaoTxt."_1.pdf";
                    if(\File::exists($filePDF)){
                        $this->info('Arquivo Existe '.$filePDF);
                        
                        $findEdicao = Edicao::where('ed_year', $ano)->where('ed_month', $mes)->where('ed_day', $dia)->first();

                        if (!$findEdicao){
                            // quantidade de pdf's de uma edição
                            // quantidade de pdf's de uma edição
                            // quantidade de pdf's de uma edição
                            // quantidade de pdf's de uma edição
                            // quantidade de pdf's de uma edição
                            //Só exibi imagem após publicar
                            //Só exibi imagem após publicar
                            //Só exibi imagem após publicar
                            //Só exibi imagem após publicar
                            $qtdFiles = 1;  // quantidade de pdf's de uma edição

                            $tempPdf = \File::get($filePDF);

                            for($sequencia = 1; $sequencia <= $qtdFiles; $sequencia++){

                                $filePDF = $dirPdf."\\".$ano.$mesTxt.$diaTxt."_".$publicacao."_".$edicaoTxt."_".$sequencia.".pdf";
                                $caminhoPdf = str_replace("\\", "/", $filePDF);

                                $pdf = new \PdfMerger;
                                $pdf->addPDF($caminhoPdf);

                                if(!\File::exists(storage_path("app/edicao/".$ano))) {
                                    \File::makeDirectory(storage_path("app/edicao/".$ano));
                                }
                                if(!\File::exists(storage_path("app/edicao/".$ano."/".$mes))) {
                                    \File::makeDirectory(storage_path("app/edicao/".$ano."/".$mes));
                                }
                                if(!\File::exists(storage_path("app/edicao/".$ano."/".$mes."/".$dia))) {
                                    \File::makeDirectory(storage_path("app/edicao/".$ano."/".$mes."/".$dia));
                                }

                                if ($sequencia == 1){
                                    $capa = "capa_".uniqid();
                                
                                    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                                    //windows
                                        $output = shell_exec('gswin64c -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$ano."/".$mes."/".$dia."/".$capa.".jpg ").$caminhoPdf);
                                    }else{
                                    //unix
                                        $output = shell_exec('/usr/bin/gs -dBATCH -dNOPAUSE -dQUIET -sDEVICE=jpeg -r50x50 -dFirstPage=1 -dLastPage=1 -sOutputFile='.storage_path("app/edicao/".$ano."/".$mes."/".$dia."/".$capa.".jpg ").$caminhoPdf);
                                    }
                                }

                                if ($sequencia == $qtdFiles){
                                    $pdfFinal = "ed_".$dia."_".uniqid();

                                    $pdf->merge('file', storage_path("app/edicao/".$ano."/".$mes."/".$dia."/".$pdfFinal.".pdf"));

                                    $data_edicao_string = $ano .'-'. $mes .'-'. $dia;
                                    
                                    $edicao = new Edicao();
                                    $edicao->ed_year = $ano;
                                    $edicao->ed_month = $mes;
                                    $edicao->ed_day = $dia;
                                    $edicao->ed_date = $data_edicao_string;
                                    $edicao->ed_file_name = $pdfFinal.".pdf";
                                    $edicao->ed_status = 0; // Em Rascunho
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
                        $this->error('Arquivo não encontrado! '.$filePDF);
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