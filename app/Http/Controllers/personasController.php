<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use SoapClient;

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

    public function consumirSOAP(Request $req){
            $requestXML = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tem="http://tempuri.org/">
            <soap:Header/>
            <soap:Body>
                <tem:Consulta_por_CURP>
                    <!--Optional:-->
                    <tem:Curp>'.$req->pcurp.'</tem:Curp>
                    <tem:id_Valor>11</tem:id_Valor>
                    <!--Optional:-->
                    <tem:Cadena>M3hx¡#¡nhU3a?LX</tem:Cadena>
                </tem:Consulta_por_CURP>
            </soap:Body>
            </soap:Envelope>';

            

            $server = 'https://sce.tamaulipas.gob.mx/WS_RENAPO_V2/Consulta_curp.asmx?wsdl';
            $headers = [
                "content-type: text/xml; charset=utf-8",
                "Content-length: " . strlen($requestXML), "Connection: close",
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $server);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 100);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $data = curl_exec($ch);

            //$xml = simplexml_load_string($data);
            // var_dump($data);
            // print_r($data);
            // print_r($data->getElementsByTagName('nombres'));
            // $json = json_encode($xml, JSON_PRETTY_PRINT);
            // dd($data);
            // print_r($json);
            // var_dump($json);
            return $data;

            if (curl_errno($ch)) {
                print curl_error($ch);
                echo "Algo fallo";
            } else {
                curl_close($ch);
            }



    }

    public function wsrfc(){
            // https://agsc.siat.sat.gob.mx/PTSC/ValidaRFC/index.jsf

            $data = [];

            $server = 'https://agsc.siat.sat.gob.mx/PTSC/ValidaRFC/index.jsf';
            $headers = [
                "content-type: text/xml; charset=utf-8",
                "Content-length: " . strlen($requestXML), "Connection: close",
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $server);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 100);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $data = curl_exec($ch);

            return $data;

            if (curl_errno($ch)) {
                print curl_error($ch);
                echo "Algo fallo";
            } else {
                curl_close($ch);
            }
    }
}
