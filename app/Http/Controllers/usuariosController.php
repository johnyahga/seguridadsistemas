<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class usuariosController extends Controller
{
    public function usuarios(){
        $data =  DB::select('select * from personas.getpersonas()');
        return view('usuarios.usuarios')->with("registros", $data);
    }
}
