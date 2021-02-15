<?php

namespace App\Http\Controllers;
use App\Edicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AssinanteController extends Controller
{

    public function index()
    {
        $publications = $this->getPublications();
        
        $titlePublications  = 'Edição';
        $descriPublications = '';
        $paginate = true;

        return view("assinante.index", compact('publications', 'titlePublications', 'descriPublications', 'paginate'));
    }

    public function getCategory(Request $request)
    {   
        switch ($request->input('category')) {
            case 1:
                $titlePublications  = 'Jornal';

                $publications = \DB::table('edicaos')
                        ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "edicao" as type, "Jornal" as caderno'))
                        ->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')
                        ->where('ed_status', '1') // Status: Ativo
                        ->paginate(8);
                break;
            case 2:
                $titlePublications  = 'Classificados';
                
                $publications = \DB::table('classificados')
                        ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "classificado" as type, "Classificados" as caderno'))
                        ->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')
                        ->where('ed_status', '1') // Status: Ativo
                        ->paginate(8);
                break;
            default:
                $titlePublications  = 'Jornal';
                
                $publications = \DB::table('edicaos')
                        ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "edicao" as type, "Jornal" as caderno'))
                        ->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')
                        ->where('ed_status', '1') // Status: Ativo
                        ->paginate(8);
                break;
        }

        $descriPublications = '';
        $paginate = true;

        return view("assinante.index", compact('publications', 'titlePublications', 'descriPublications', 'paginate'));
    }

    public function getPublicationsFilter(Request $request)
    {
        $publications = $this->getPublications($request);
        
        $data_edicao = explode('-', $request->input('startDate'));
    
        $day    = $data_edicao[2];
        $month  = $data_edicao[1];
        $year   = $data_edicao[0];

        $titlePublications  = "$day/$month/$year";
        
        if( $publications->isNotEmpty() )
            $descriPublications  = 'Exibindo resultado.';
        else{
            if($year < 2018)
                $descriPublications  = 'Ainda não existem publicações anteriores a 1 de janeiro de 2018.';
            else
                $descriPublications  = 'Não foi encontrado nenhum resultado.';
        }
        //'Nenhum resultado encontrado';

        //$titlePublications  = $request->input('startDate');2019-06-11

        
        /*
        switch ($request->input('category')) {
            case 1:
                $titlePublications  = 'Edições';
                $publicationType    = 'edicao';
                break;
            case 2:
                $titlePublications  = 'Classificados';
                $publicationType    = 'classificado';
                break;
            default:
                $titlePublications  = 'Edições';
                $publicationType    = 'edicao';
                break;
        }*/

        $paginate = false;

        return view("assinante.index", compact('publications', 'titlePublications', 'descriPublications', 'paginate'));
    }

    public function getPublications(Request $where = null){
        if($where){
            switch ($where->input('category')) {
                case 1:
                    $publications = \DB::table('edicaos')
                        ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "edicao" as type, "Jornal" as caderno'))
                        ->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')
                        ->where('ed_status', '1') // Status: Ativo
                        ->whereBetween('ed_date', [$where->input('startDate'), $where->input('endDate')])
                        ->paginate(8);
                    break;
                case 2:
                    $publications = \DB::table('classificados')
                        ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "classificado" as type, "Classificados" as caderno'))
                        ->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')
                        ->where('ed_status', '1') // Status: Ativo
                        ->whereBetween('ed_date', [$where->input('startDate'), $where->input('endDate')])
                        ->paginate(8);
                    break;
                default:
                    $edicaos = \DB::table('edicaos')
                        ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "edicao" as type, "Jornal" as caderno'))
                        ->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')
                        ->where('ed_status', '1') // Status: Ativo
                        ->whereBetween('ed_date', [$where->input('startDate'), $where->input('endDate')])
                        ->get();

                    $classificados = \DB::table('classificados')
                        ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "classificado" as type, "Classificados" as caderno'))
                        ->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')
                        ->where('ed_status', '1') // Status: Ativo
                        ->whereBetween('ed_date', [$where->input('startDate'), $where->input('endDate')])
                        ->get();

                    $publications = $edicaos->merge($classificados);
                    break;
            }
        }else{
            $publications = \DB::table('edicaos')
                ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "edicao" as type, "Jornal" as caderno'))
                ->orderBy('ed_year', 'desc')->orderBy('ed_month', 'desc')->orderBy('ed_day', 'desc')
                ->where('ed_status', '1') // Status: Ativo
                ->paginate(8);
        }

        return $publications;
    }

    public function getEditionsByYearMonth(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $publications = \DB::table('edicaos')
                ->select(\DB::raw('ed_day, ed_month, ed_year, ed_file_name, ed_capa, "edicao" as type, "Jornal" as caderno'))
                            ->orderBy('ed_year', 'desc')
                            ->orderBy('ed_month', 'desc')
                            ->orderBy('ed_day', 'desc')
        
                            ->where('ed_year', $year)
                            ->where('ed_month', $month)
                            ->where('ed_status', '1')
                            ->paginate(8);
        
        $titlePublications  = 'Edições';
        $descriPublications = '';
        $paginate = true;

        return view("assinante.index", compact('publications', 'titlePublications', 'descriPublications', 'paginate'));
    }

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

    // getMonthsByYear -- retorna os meses de um ano presentes no Banco de Dados
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
}
