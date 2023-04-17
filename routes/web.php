<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personasController;
use App\Http\Controllers\usuariosController;
use Illuminate\Http\Request; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/personas');
});

Route::get('/test' , [personasController::class, "consumirSOAP"])->name("crud.test");
// Route::get('/test','personasController@test');

Route::get('/buscar-curp' , [personasController::class, "consumirSOAP"])->name("buscar-curp");

Route::get('/personas' , [personasController::class, "personas"])->name("personas-registros");
Route::get('/personas-form' , [personasController::class, "personasForm"])->name("personas-form");
Route::get('/get-persona' , [personasController::class, "getPersona"])->name("get-persona");
Route::get('/get-personas' , [personasController::class, "getPersonas"])->name("get-personas");
Route::get('/get-generos' , [personasController::class, "getGeneros"])->name("get-generos");
Route::get('/editar-persona-form' , [personasController::class, "editPersonaForm"])->name("editar-persona-form");
// Route::get('/editar-personas' , [personasController::class, "editarPersona"])->name("editar-personas");

Route::get('/eliminar-persona' , [personasController::class, "eliminarPersona"])->name("eliminar-persona");
Route::post('/insertar-persona' , [personasController::class, "insertarPersona"])->name("insertar-persona");
Route::get('/insertar-genero' , [personasController::class, "insertarGenero"])->name("insertar-genero");

Route::get('/editar-personas', function(Request $req){
    try {
    $generos = DB::select("CALL personas.actualizarpersona($req->id_persona,'$req->curp', '$req->rfc', '$req->nombre', '$req->apellido1', '$req->apellido2', '$req->mail_personal', '$req->mail_instit','$req->domicilio', $req->id_genero)");
    $registros =  DB::select('select * from personas.getpersonas()');
    $accion = "success-editar";
    // $data->action = 'success'
    return view('personas', compact('registros', 'accion'));
    // return redirect('/personas')->with('accion', 'success-editar')->with('registros', $registros);
    // return redirect()->route('personas-registros', ['registros' => $registros, 'accion' => $accion]);
    // return redirect()->route('personas-registros', ['accion' => $accion, 'registros' => $registros]);
    //return $generos;

    } catch (Exception $ex) {
        $generos = DB::select('select * from personas.getgeneros()');
        $errormsg = explode('ERROR:',$ex->getMessage());
        $errormsg = explode('CONTEXT',$errormsg[1]);
        $errormsg = trim($errormsg[0]);

        if(strlen($errormsg) > 61)
        $errormsg = trim(explode('DETAIL:', $errormsg)[1]);
        $persona = DB::select("select * from personas.getpersona($req->id_persona)");
        $datos = $req->all();
        $accion = 'error';
        return view('formulario2', compact('generos', 'accion', 'errormsg', 'persona', 'datos'));
    }
})->name('editar-personas');

Route::post('/insertar-persona', function(Request $req){
    try {
        
    $generos = DB::select("CALL personas.insertarpersona('$req->curp', '$req->rfc', '$req->apellido1', '$req->apellido2', '$req->nombre', $req->id_genero, '$req->domicilio', '$req->mail_personal', '$req->mail_instit')");
    $registros =  DB::select('select * from personas.getpersonas()');
    $accion = "success";
    // $data->action = 'success'
    return view('personas', compact('registros', 'accion'));
    // return redirect('/personas')->with('registros', $registros)->with('accion', $accion);
    //return $generos;

    } catch (Exception $ex) {
        $generos = DB::select('select * from personas.getgeneros()');
        $errormsg = explode('ERROR:',$ex->getMessage());
        $errormsg = explode('CONTEXT',$errormsg[1]);
        $errormsg = trim($errormsg[0]);
        $datos = $req->all();
        $accion = 'error';
        return view('formulario', compact('generos', 'accion', 'errormsg', 'datos'));
        // return $datos['curp'];
    }
})->name('insertar-persona');

Route::get('/usuarios', [usuariosController::class, "usuarios"])->name("usuarios-registros");
Route::get('/aplicaciones', [personasController::class, "usuarios"])->name("aplicaciones-registros");
Route::get('/permisos', [personasController::class, "usuarios"])->name("permisos-registros");
Route::get('/roles', [usuariosController::class, "usuarios"])->name("roles-registros");
