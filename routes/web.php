<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personasController;
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

Route::get('/test' , [personasController::class, "test"])->name("crud.test");
// Route::get('/test','personasController@test');

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

// Route::get('/personas', function () {
//     $data =  DB::select('select * from personas.getpersonas()');
//     return view('personas')->with("registros", $data);
// })->name('personas-registros');

// Route::get('/personas-form', function () {
//     $generos = DB::select('select * from personas.getgeneros()');
//     return view('formulario')->with("generos", $generos);
// })->name('personas-form');

// Route::get('/get-persona', function(Request $req){
//     $persona = DB::select("select * from personas.getpersona($req->id_persona)");
//     return $persona;
// })->name('get-persona');

// Route::get('/get-personas', function(Request $req){
//     $personas = DB::select('select * from personas.getpersonas()');
//     return $personas;
// })->name('get-personas');

// Route::get('/get-generos', function(){
//     $generos = DB::select('select * from personas.getgeneros()');
//     return $generos;
// })->name('get-generos');

// Route::get('/editar-persona-form', function (Request $req) {
//     $persona = DB::select("select * from personas.getpersona($req->id_persona)");
//     $generos = DB::select('select * from personas.getgeneros()');
//     return view('formulario2', compact('persona', 'generos'));
//     // return redirect()->route('personas', ['personas' => $persona, 'generos' => $generos]);
// })->name('editar-persona-form');

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
        $persona = DB::select("select * from personas.getpersona($req->id_persona)");
        $accion = 'error';
        return view('formulario2', compact('generos', 'accion', 'errormsg', 'persona'));
    }
})->name('editar-personas');

// Route::get('/eliminar-persona', function(Request $req){
//     $generos = DB::select("CALL personas.eliminarpersona($req->id_persona)");
//     return $generos;
// })->name('eliminar-persona');

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

// Route::get('/insertar-genero', function(Request $req){
//     // print_r($req->all());
//     DB::select("CALL personas.insertargenero('$req->nombre')");
//     $generos = DB::select('select * from personas.getgeneros()');
//     return $generos;
// })->name('insertar-genero');

// Route::get('/personas-form','personasController@nuevaPersona')->name('personas-form');

