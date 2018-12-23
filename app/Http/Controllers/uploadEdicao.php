<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadEdicao extends Controller
{
    
    public function uploadView(){
        return view("admin.uploadEdicao");
    } 

    public function uploadPost(Request $request){
            $this->validate($request,[
                "edicao"=>"required"
            ],[
                "edicao.required" => "PDF é obrigatório!"
            ]);

        if ($request->hasFile('edicao')){
            $imagem = $request->file('edicao');
            $imagem = $request->edicao;
            
            $imagem_nome = time().$imagem->getClientOriginalName();
        }

    }

}
