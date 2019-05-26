<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class SiteLoginController extends Controller
{
    public function index(){
      return view('login.index');
    }

    public function entrar(Request $req){
      $dados = $req->all();
      if( Auth::attempt( [ 'email'=>$dados['email'], 'password'=>$dados['senha'] ] ) ){
      return redirect()->route('admin.cursos');
      }
      return redirect()->route('login');
    }

    public function sair(){
      Auth::logout();
      return redirect()->route('home');
    }
}
