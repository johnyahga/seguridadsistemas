<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;

class personasController extends Controller
{

    public function test(){
        print_r('hello world!');
    }

    public function personas(){
        $data =  DB::select('select * from personas.getpersonas()');
        return view('personas')->with("registros", $data);
    }

    public function personasForm(){
        $generos = DB::select('select * from personas.getgeneros()');
        return view('formulario')->with("generos", $generos);
    }

    public function getPersona(Request $req){
        $persona = DB::select("select * from personas.getpersona($req->id_persona)");
        return $persona;
    }

    public function getPersonas(Request $req){
        $personas = DB::select('select * from personas.getpersonas()');
        return $personas;
    }

    public function getGeneros(Request $req){
        $generos = DB::select('select * from personas.getgeneros()');
        return $generos;
    }

    public function editPersonaForm(Request $req){
        $persona = DB::select("select * from personas.getpersona($req->id_persona)");
        $generos = DB::select('select * from personas.getgeneros()');
        return view('formulario2', compact('persona', 'generos'));
    }

    public function editarPersona(Request $req){
        try {
            $generos = DB::select("CALL personas.actualizarpersona($req->id_persona,'$req->curp', '$req->rfc', '$req->nombre', '$req->apellido1', '$req->apellido2', '$req->mail_personal', '$req->mail_instit','$req->domicilio', $req->id_genero)");
            $registros =  DB::select('select * from personas.getpersonas()');
            $accion = 'success-editar';
            return view('personas', compact('registros', 'accion'));
            // return redirect()->route('personas-registros', ['registros' => $registros, 'accion' => $accion]);
            // return redirect()->route('personas-registros', ['accion' => $accion, 'registros' => $registros]);
            //return $generos;
        
        } catch (Exception $ex) {
            $generos = DB::select('select * from personas.getgeneros()');
            $errormsg = explode('ERROR:',$ex->getMessage());
            $errormsg = explode('CONTEXT',$errormsg[1]);
            $errormsg = trim($errormsg[0]);
            $persona = DB::select("select * from personas.getpersona($req->id_persona)");
            $accion = 'error';
            return view('formulario2', compact('generos', 'accion', 'errormsg', 'persona'));
        }
    }

    public function eliminarPersona(Request $req){
        $persona = DB::select("CALL personas.eliminarpersona($req->id_persona)");
        return $persona;
    }

    public function insertarPersona(Request $req){
        try {
            $generos = DB::select("CALL personas.insertarpersona('$req->curp', '$req->rfc', '$req->apellido1', '$req->apellido2', '$req->nombre', $req->id_genero, '$req->domicilio', '$req->mail_personal', '$req->mail_instit')");
            $registros =  DB::select('select * from personas.getpersonas()');
            $accion = 'success';
            // $data->action = 'success'
            return view('personas', compact('registros', 'accion'));
            //return $generos;    
        } catch (Exception $ex) {
            $generos = DB::select('select * from personas.getgeneros()');
            $errormsg = explode('ERROR:',$ex->getMessage());
            $errormsg = explode('CONTEXT',$errormsg[1]);
            $errormsg = trim($errormsg[0]);
            $accion = 'error';
            return view('formulario', compact('generos', 'accion', 'errormsg'));
        }
    }

    public function insertarGenero(Request $req){
        // print_r($req->all());
        DB::select("CALL personas.insertargenero('$req->nombre')");
        $generos = DB::select('select * from personas.getgeneros()');
        return $generos;
    }
}
