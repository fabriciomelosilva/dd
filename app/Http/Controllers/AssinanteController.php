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

    // getMonth -- retorna o mês atual
    public function getMonth() {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set("America/Fortaleza");
        $dateNow = getdate();
        $month = $dateNow['mon'];

        $month_name = date(mktime(0, 0, 0, $month));

        return ucwords(strftime('%B',$month_name));
    }

    // getMonths -- retorna os meses presentes no Banco de Dados
    public function getMonths($year) {
        $months = \DB::table('edicaos')
            ->select('ed_month')
            ->where('ed_year', $year)
            ->where('ed_status', '1') // Status: Ativo
            ->groupBy('ed_month')
            ->get();
        
        return $months;
    }

    public function getEditions($where = null){
        $edicao = \DB::table('edicaos')->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')->where('ed_status', '1')->paginate(8);

        return $edicao;
    }

    public function getMonthsByYear(Request $request){

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set("America/Fortaleza");
        $year = $request->input('year');

  
        $months = \DB::table('edicaos')
            ->select('ed_month')
            ->where('ed_year', $year)
            ->where('ed_status', '1')
            ->groupBy('ed_month')
            ->get();
      
        return $months;
    }

    public function index()
    {  
       $edicao = $this->getEditions();
       //$classificado = $this->getClassificados();

       //$conteudo = $edicao;
       
       return view("assinante.index", compact('edicao'));
    }

    public function getEditionsByYearMonth(Request $request)
    {

        $year = $request->input('year');
        $month = $request->input('month');

        $years = $this->getYears();
        $months = $this->getMonths($year);

        $edicao = \DB::table('edicaos')->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')->where('ed_year', $year)->where('ed_month', $month)->where('ed_status', '1')->paginate(8);

        return view("assinante.index", compact('edicao','year','month','years','months'));
    }

    public function getPublicationsFilter(Request $request)
    {
        $startDate = date($request->input('startDate'));
        $endDate = date($request->input('endDate'));
        $category = $request->input('category');

        $edicao = $this->getEditions();
        $edicao = \DB::table('edicaos')
            ->orderBy('ed_year', 'desc')
            ->orderBy('ed_month', 'desc')
            ->orderBy('ed_day', 'desc')

            ->whereBetween('ed_date', [$startDate, $endDate])

            ->where('ed_status', '1')->paginate(8);

        return view("assinante.index", compact('edicao'));
    }
}
