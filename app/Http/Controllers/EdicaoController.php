<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdicaoController extends Controller
{
    public function cadastroEdicaoGet(){
        return view("admin.pages.edicao");
    } 

    public function cadastroEdicaoPost(Request $request){
        $this->validate($request,[
            "edicao"=>"required"
        ],[
            "edicao.required" => "PDF é obrigatório!"
        ]);
        
        if ($request->hasFile('edicao')){
            $files = $request->file('edicao');
            
            foreach ($files as $key => $file) {
                $file = $request->edicao;
                
                $file[$key]->store('edicao');

                
                //$file_path = $file[$key]->getPathName();

                //var_dump($file_path);

                //\Storage::disk('local')->put($file_path, 'Contents');

                //$file = $request->edicao;
                //$file_name = time().$file[$key]->getClientOriginalName();
                //var_dump($file[$key]);
            }
 
        }    
    } 
}
