<?php

namespace App\Http\Controllers;
use App\Libro;
use App\Autor;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $libros1=Libro::join('autors', 'libros.id_A', '=', 'autors.id')->select('aut_nombre', 'lbr_titulo',
        'lbr_like', 'lbr_imagen', 'lbr_slug')->orderby('lbr_like', 'desc')->paginate(4);


        return view('home', \compact('libros1'));
    }
}
