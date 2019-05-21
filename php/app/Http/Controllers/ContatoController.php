<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index($id = null)
    {
        /*
        $contatos = [
            ["nome"=>"Luciano", "tel"=>"7199283928"],
            ["nome"=>"Laura", "tel"=>"71949494949"],
            ["nome"=>"Lorena", "tel"=>"7194949498"],
            ["nome"=>"Lazaro", "tel"=>"7199393938"]
        ];
        */
        $contato = new \App\Contato();
        $contatos = $contato->lista();
        return view('contato.index', compact('contatos'));//direciona para uma view contato/index
    }

    public function criar(Request $req)
    {
        dd($req); //$req->all() || $req['nome']
        return "Contato controller criar";
    }

    public function editar ()
    {
        return "Contato controller editar";
    }
}
