<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class usuariosController extends Controller
{
    public function usuarios(){
        $data =  DB::select('select * from seguridad.getusuarios()');
        return view('usuarios.usuarios')->with("registros", $data);
    }

    public function getUsuario(Request $req){
        $data = DB::select("select * from seguridad.getusuario($req->id_usuario)");
        return $data;
    }

    public function getUsuarios(Request $req){
        $data =  DB::select('select * from seguridad.getusuarios()');
        return $data;
    }

    public function activarDesactivarUsuario(Request $req){
        // $activar = true;
        if($req->estado)
            $data = DB::select("CALL seguridad.desactivarusuario($req->id_usuario, false)");
        else
            $data = DB::select("CALL seguridad.desactivarusuario($req->id_usuario, true)");

        return $data;
    }

}
