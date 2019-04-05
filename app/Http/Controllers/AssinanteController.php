<?php

namespace App\Http\Controllers;
use App\Edicao;
use Illuminate\Http\Request;



class AssinanteController extends Controller
{

    public function getYear() {

        date_default_timezone_set("America/Fortaleza");
        $dateNow = getdate();

        $year = $dateNow['year'];

        return $year;
    }
    public function getYears() {

        $years = \DB::table('edicaos')
        ->select('ed_year')
        ->where('ed_status', '1')
        ->orderBy('ed_year', 'desc')
        ->groupBy('ed_year')
        ->get();

        return $years;

    }
    public function getMounth() {

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set("America/Fortaleza");
        $dateNow = getdate();
        $mounth = $dateNow['mon'];

        $month_name = date(mktime(0, 0, 0, $mounth));

        return ucwords(strftime('%B',$month_name));
    }

    public function getMounths($year) {

        $mounths = \DB::table('edicaos')
        ->select('ed_mounth')
        ->where('ed_year', $year)
        ->where('ed_status', '1')
        ->groupBy('ed_mounth')
        ->get();
        
        return $mounths;
    }

    public function getEditions($year){

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

        foreach($mounths as $mounth){
            $month_name = date(mktime(0, 0, 0, $mounth->ed_mounth));
            $month_name = ucwords(strftime('%B',$month_name));
            $meses[] = $month_name;
        }

      
        return $meses;
    }

    public function index()
    {  

       $year = $this->getYear();
       $years = $this->getYears();
  
       $mounths = $this->getMounths($year);

        $edicao_ano = \DB::table('edicaos')->select('ed_year')->groupBy('ed_year')->orderBy('ed_year', 'desc')->get();
            
            //$menu = array();
            //foreach($edicao_ano as $ano){
                //$edicao_mes = \DB::table('edicaos')->select('ed_mounth')->groupBy('ed_mounth')->where('ed_year', $ano->ed_year)->get();
                //foreach($edicao_mes as $mes){
                     //$menu[$ano->ed_year][] = $mes->ed_mounth;
                //}
            //}

            $edicao = $this->getEditions($year);

            return view("assinante.index", compact('edicao','year','mounth','years','mounths'));
    }



}
