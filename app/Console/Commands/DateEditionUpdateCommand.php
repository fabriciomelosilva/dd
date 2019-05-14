<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Edicao;

class DateEditionUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DateEditionUpdateCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que atualiza a coluna ed_date';

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

        $edicoes = Edicao::whereNull('ed_date')->get();
        foreach($edicoes as $edicao){
            $data_edicao_string = $edicao->ed_year .'-'. $edicao->ed_month .'-'. $edicao->ed_day;
            $this->info($data_edicao_string);

            $edicao->ed_date = $data_edicao_string;
            $edicao->update();
        }

        $this->info('********* Diario Digital *********');
    }
}
