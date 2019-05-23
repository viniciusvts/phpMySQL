<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $registros = \App\Curso::all();
        return view('admin.cursos.index', compact('registros'));
    }
    public function adicionar()
    {
      return view('admin.cursos.adicionar');
    }
    public function salvar(Request $req)
    {
      $dados = $req->all();

      //verifica se foi enviado o true do publicado
      if( isset($dados['publicado']) ){
        $dados['publicado'] = 'sim';
      }else{
        $dados['publicado'] = 'nao';
      }

      //verifica se tem um arquivo chamado imagem no request
      if( $req->hasFile('imagem') ){
        //obtem esse arquivo
        $imagem = $req->file('imagem');

        //gera um numero aleatório para dar nome a imagexbm
        $num = rand(11111,99999);

        //define o direorio onde vou salvar a imagexbm
        $dir = 'img/cursos/';

        //pega a extenção do arquivo
        $ex = $imagem->guessClientExtension();

        //nome completo do arquivo
        $nomeDaImagem = "imagem_".$num.".".$ex;

        //salvar o arquivo
        $imagem->move($dir, $nomeDaImagem);

        //salvo o caminho da imaagem no banco
        $dados['imagem'] = $dir.$nomeDaImagem;
      }
      //salva no banco os $dados
      //não esquecer os fillables do modelo
      Curso::create($dados);

      //redireciona o user para a página
      return redirect()->route('admin.cursos');
    }
    public function editar($id)
    {
      $registro = Curso::find($id);
      return view('admin.cursos.editar', compact('registro'));
    }
    public function atualizar(Request $req, $id)
    {
      $dados = $req->all();

      //verifica se foi enviado o true do publicado
      if( isset($dados['publicado']) ){
        $dados['publicado'] = 'sim';
      }else{
        $dados['publicado'] = 'nao';
      }

      //verifica se tem um arquivo chamado imagem no request
      if( $req->hasFile('imagem') ){
        //obtem esse arquivo
        $imagem = $req->file('imagem');

        //gera um numero aleatório para dar nome a imagexbm
        $num = rand(11111,99999);

        //define o direorio onde vou salvar a imagexbm
        $dir = 'img/cursos/';

        //pega a extenção do arquivo
        $ex = $imagem->guessClientExtension();

        //nome completo do arquivo
        $nomeDaImagem = "imagem_".$num.".".$ex;

        //salvar o arquivo
        $imagem->move($dir, $nomeDaImagem);

        //salvo o caminho da imaagem no banco
        $dados['imagem'] = $dir.$nomeDaImagem;
      }
      //salva no banco os $dados
      //não esquecer os fillables do modelo
      Curso::find($id)->update($dados);

      //redireciona o user para a página
      return redirect()->route('admin.cursos');
    }
    public function deletar($id)
    {
      Curso::find($id)->delete();
      return redirect()->route('admin.cursos');
    }
}
