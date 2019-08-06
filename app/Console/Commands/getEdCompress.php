<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class getEdCompress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getEdCompress {diretorioOrigem} {diretorioDestino}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info('********* Diario Digital *********');
        $this->info('********* getEdCompress *********');

        $diretorioOrigem  = $this->argument('diretorioOrigem');
        $diretorioDestino = $this->argument('diretorioDestino');

        $this->info($diretorioOrigem);

        if(\File::exists( $diretorioOrigem )){
            $this->info('Diretorio Existe '.$diretorioOrigem);
        }else{
            $this->error('Diretorio Não Existe '.$diretorioOrigem);
            return 0;
        }

        $this->info($diretorioDestino);

        if(\File::exists( $diretorioDestino )){
            $this->info('Diretorio Existe '.$diretorioDestino);
        }else{
            $this->error('Diretorio Não Existe '.$diretorioDestino);
            return 0;
        }

        $files = \File::allFiles( $diretorioOrigem );
        $this->info('Diretorio Possui '.count($files).' elementos');

        foreach ($files as $file) {
            $tag = explode('_', $file->getBasename());
            $data = $tag[0];

            if($data == 'ed'){
                $this->info($data . ' - ' . $file);

                $arrayFile = explode("\\", $file);
                $tamanhoArray = count($arrayFile);
                $dia = $arrayFile[ $tamanhoArray - 2 ];
                $mes = $arrayFile[ $tamanhoArray - 3 ];
                $ano = $arrayFile[ $tamanhoArray - 4 ];
                
                if($dia < 10) $dia = "0".$dia;
                if($mes < 10) $mes = "0".$mes;

                $this->info($dia . ' / ' . $mes . ' / ' . $ano);

                $dirNovo = $diretorioDestino . '\\' . $ano . $mes . $dia;
                $nomeNovo = $ano . $mes . $dia . '-file.pdf';
                if(!\File::exists($dirNovo)) {
                    \File::makeDirectory($dirNovo);
                    $this->info('Criado diretorio ' .$dirNovo);
                }

                if(\File::copy($file, $dirNovo.'\\'.$nomeNovo)){
                    $this->info('Arquivo Copiado '.$dirNovo.'\\'.$nomeNovo);
                }
            }
        }
    }
}