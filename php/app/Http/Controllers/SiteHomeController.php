<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Curso;

class SiteHomeController extends Controller
{
    public function index()
    {
      $cursos = Curso::paginate(3);
      return view('home', compact('cursos'));
    }
}
