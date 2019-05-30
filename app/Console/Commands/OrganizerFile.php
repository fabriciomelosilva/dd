<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OrganizerFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OrganizeFile {diretorio}';

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

        $dir = $this->argument('diretorio'); // '\\hermes04\Web_diario';

        $this->info($dir);

        if(\File::exists( $dir )){
            $this->info('Diretorio Existe '.$dir);
        }else{
            $this->error('Diretorio Não Existe '.$dir);
            return 0;
        }

        $files = \File::allFiles( $dir );
        $this->info('Diretorio Possui '.count($files).' elementos');
    }
}
