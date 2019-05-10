<?php

namespace App\Http\Controllers;
use App\Edicao;
use Illuminate\Http\Request;

class AssinanteController extends Controller
{
    // getYear -- retorna o Ano atual
    public function getYear() {
        date_default_timezone_set("America/Fortaleza");
        $dateNow = getdate();

        $year = $dateNow['year'];

        return $year;
    }

    // getYears -- retorna todos os Anos presentes no Banco de Dados
    public function getYears() {
        $years = \DB::table('edicaos')
            ->select('ed_year')
            ->where('ed_status', '1') // Status: Ativo
            ->orderBy('ed_year', 'desc')
            ->groupBy('ed_year')
            ->get();

        return $years;
    }

    // getMounth -- retorna o mês atual
    public function getMounth() {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set("America/Fortaleza");
        $dateNow = getdate();
        $mounth = $dateNow['mon'];

        $month_name = date(mktime(0, 0, 0, $mounth));

        return ucwords(strftime('%B',$month_name));
    }

    // getMounths -- retorna os meses presentes no Banco de Dados
    public function getMounths($year) {
        $mounths = \DB::table('edicaos')
            ->select('ed_mounth')
            ->where('ed_year', $year)
            ->where('ed_status', '1') // Status: Ativo
            ->groupBy('ed_mounth')
            ->get();
        
        return $mounths;
    }

    public function getEditions($where = null){
        $edicao = \DB::table('edicaos')->orderBy('ed_year', 'desc')->orderBy('ed_mounth', 'desc')->orderBy('ed_day', 'desc')->where('ed_status', '1')->paginate(8);

        return $edicao;
    }

    public function getMounthsByYear(Request $request){

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set("America/Fortaleza");
        $year = $request->input('year');

  
        $mounths = \DB::table('edicaos')
            ->select('ed_mounth')
            ->where('ed_year', $year)
            ->where('ed_status', '1')
            ->groupBy('ed_mounth')
            ->get();
      
        return $mounths;
    }

    public function index()
    {  
       $edicao = $this->getEditions();
       //$classificado = $this->getClassificados();

       //$conteudo = $edicao;
       
       return view("assinante.index", compact('edicao'));
    }

    public function getEditionsByYearMounth(Request $request)
    {

        $year = $request->input('year');
        $mounth = $request->input('mounth');

        $years = $this->getYears();
        $mounths = $this->getMounths($year);

        $edicao = \DB::table('edicaos')->orderBy('ed_year', 'desc')->orderBy('ed_mounth', 'desc')->orderBy('ed_day', 'desc')->where('ed_year', $year)->where('ed_mounth', $mounth)->where('ed_status', '1')->paginate(8);
                //$conteudo = $edicao;
        return view("assinante.index", compact('edicao','year','mounth','years','mounths'));
    }
}
