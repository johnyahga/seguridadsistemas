@extends('layouts.contentIncludes2')
@section('title','Sistema Seguridad') 

@section('content')
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<div class="container-fluid py-4 mt-3">
      <div class="row mt-4">
<div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card ">
        <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Registros Usuarios</h6> 
            </div>
        </div>
        <!-- descomentar en caso de que falle el responsive -->
        <div class="table-responsive">
        <!-- comentar en caso de que falle el responsive -->
        <!-- <div class=""> -->
            <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Persona asociada</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de registro</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de modificación</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody id="table-body">
                    @if(count($registros) >= 2)
                        @foreach($registros as $registro)
                            <tr >
                                <td class="align-middle text-center text-sm"> {{ $registro->id }} </td>
                                <td class="mb-0 text-sm"> {{ $registro->nombre }} </td><!--class="text-xs text-secondary mb-0"-->
                                <td class="mb-0 text-sm"> {{ $registro->apellido_1 }} </td>
                                <td class="mb-0 text-sm"> {{ $registro->apellido_2 }} </td>
                                <td class="mb-0 text-sm"> {{ $registro->curp }} </td>
                                <td class="mb-0 text-sm"> {{ $registro->rfc  }} </td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-link text-secondary mb-0 "
                                            data-bs-toggle="dropdown" id="opciones"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="opciones1">
                                            <li>
                                                <a  onclick="ver({{$registro->id}})" class="dropdown-item" href="#">
                                                    <i class="fas fa-eye"></i> Visualizar
                                                </a>
                                            </li>
                                            <li>
                                                <a  onclick="editar({{$registro->id}})" class="dropdown-item" href="#">
                                                    <i class="fas fa-edit"></i> Editar registro
                                                </a>
                                            </li>
                                            
                                            <li>
                                            <a  onclick="eliminar({{$registro->id}})" class="dropdown-item" href="#">
                                                    <i class="fas fa-trash"></i> Eliminar registro
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    @elseif( count($registros)==1)
                        <tr >
                            <td class="align-middle text-center text-sm"> {{ $registros[0]->id }} </td>
                            <td class="mb-0 text-sm"> {{ $registros[0]->nombre }} </td><!--class="text-xs text-secondary mb-0"-->
                            <td class="mb-0 text-sm"> {{ $registros[0]->apellido_1 }} </td>
                            <td class="mb-0 text-sm"> {{ $registros[0]->apellido_2 }} </td>
                            <td class="mb-0 text-sm"> {{ $registros[0]->curp }} </td>
                            <td class="mb-0 text-sm"> {{ $registros[0]->rfc  }} </td>
                            <td class="align-middle">
                                <div class="dropdown">
                                    <button class="btn btn-link text-secondary mb-0 "
                                        data-bs-toggle="dropdown" id="opciones"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        <i class="fa fa-ellipsis-v text-xs"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="opciones1">
                                        <li>
                                                <a  onclick="ver({{$registros[0]->id}})" class="dropdown-item" href="#">
                                                    <i class="fas fa-eye"></i> Visualizar
                                                </a>
                                            </li>
                                            <li>
                                                <a  onclick="editar({{$registros[0]->id}})" class="dropdown-item" href="#">
                                                    <i class="fas fa-edit"></i> Editar registro
                                                </a>
                                            </li>
                                            
                                            <li>
                                            <a  onclick="eliminar({{$registros[0]->id}})" class="dropdown-item" href="#">
                                                    <i class="fas fa-trash"></i> Eliminar registro
                                                </a>
                                            </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr >
                            <th colspan="2"> No existen registros </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<!-- MODAL Ver -->
<div class="modal fade" id="modalVisualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de la Persona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="d-flex justify-content-center" >
      <span class="fa fa-spinner fa-spin fa-3x" style="" id="loaderVista"></span>
      </div>
      <div class="card-body" id="form-registro">
            <form method="POST"
              class="form form-vertical" enctype="multipart/form-data">
              <div class="form-body">
                <div class="row">

                  <div class="col-6">
                    <div class="form-group">
                      <label for="curp">CURP</label>
                      <input type="text" id="verCURP" class="form-control" name="verCURP" value="" readonly>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="rfc">RFC</label>
                      <input type="text" id="verRFC" class="form-control" name="verRFC" value="" readonly>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="nombre_persona">Nombre</label>
                      <input type="text" id="verNombre" class="form-control" name="" readonly 
                      value="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="apellido_paterno">Apellido paterno</label>
                      <input type="text" id="verApellido1" class="form-control" name="" 
                        readonly value="">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="apellido_materno">Apellido materno</label>
                      <input type="text" id="verApellido2" class="form-control" name="" 
                        readonly value="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="genero">Genero</label>
                      <input type="text" id="verGenero" class="form-control"  maxlength="90"
                        readonly value="{{ old('escuela') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="email_personal">Correo personal</label>
                      <input type="email" id="verEmail1" class="form-control" name="" 
                     readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="email_instit">Correo institucional</label>
                      <input type="email" id="verEmail2" class="form-control" name="" 
                        readonly>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="domicilio">Domicilio</label>
                      <input type="text" id="verDomicilio" class="form-control"
                        name="" value="" readonly>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<!-- Modal Confirmar -->
<div class="modal fade" id="confirmarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#confirmarModal').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Seguro que quieres eliminar el registro?
        <input type="hidden" id="id_persona_eliminar" name="id_persona_eliminar" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#confirmarModal').modal('hide');">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="eliminarPersona()" >Confirmar</button>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/scripts/modal/components-modal.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <script src="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script>
    $(document).ready(function () {
      setTimeout(alertAcciones, 1000);
    });

    function alertAcciones(){
      var accion = '<?PHP echo (!empty($accion) ? $accion : '""'); ?>';
       var msg = '<?PHP printf( (!empty($errormsg) ? strval($errormsg) : '""') ); ?>';
       console.log('accion: '+accion);
       if(accion != ""){
        switch (accion) {
            case 'success':
                Swal.fire(
                        'Nuevo registro',
                        'Se ha agregado una nueva persona correctamente',
                        'success'
                        );
                break;
            case 'success-delete':
                Swal.fire(
                        'Registro eliminado',
                        'Se ha eliminado un registro correctamente',
                        'success'
                        );
                break;
            case 'success-editar':
                Swal.fire(
                        'Registro actualizado',
                        'Se ha actualizado un registro correctamente',
                        'success'
                        );
                break;
        
            default:
                break;
        }
       }
    }

    function abrirmodal(){
        $('#confirmarModal').modal('show');
        // $('#confirmarModal').modal('hide');
    }

    function eliminar(id){
        $('#confirmarModal').modal('show');
        $('#id_persona_eliminar').val(id); 
    }

    function eliminarPersona(){
        $.ajax({
                method: "get",
                url: "eliminar-persona",
                data: { id_persona: $('#id_persona_eliminar').val() },
                beforeSend: function() {
                    console.log('hola');
                    $('#confirmarModal').modal('hide');
                },
                success:function( ) {
                    Swal.fire(
                        'Registro eliminado',
                        'Se ha eliminado un registro correctamente',
                        'success'
                        );
                    actualizarTabla();
                },
                error:function( ) {
                    
                },
            });  
    }

    function ver(id){
        $('#modalVisualizar').modal('show');
        $('#loaderVista').css('display','block');
        $.ajax({
                method: "get",
                url: "get-persona",
                data: { id_persona: id },
                beforeSend: function() {

                },
                success:function(data) {
                  $('#loaderVista').css('display','none');
                    $('#verRFC').val(data[0].rfc);
                    $('#verCURP').val(data[0].curp);
                    $('#verNombre').val(data[0].nombre);
                    $('#verApellido1').val(data[0].apellido_1);
                    $('#verApellido2').val(data[0].apellido_2);
                    $('#verGenero').val(data[0].genero);
                    $('#verEmail1').val(data[0].mail_personal);
                    $('#verEmail2').val(data[0].mail_instit);
                    $('#verDomicilio').val(data[0].domicilio);
                },
                error:function( ) {
                    
                },
            });  
    }

    function editar(id_persona){
      window.location = '/editar-persona-form?id_persona=' + id_persona;
    }

    function actualizarTabla(){
        $.ajax({
                method: "get",
                url: "get-personas",
                beforeSend: function() {
                    console.log('hola');
                },
                success:function( data ) {
                    htmldata = "";
                    $.each( data, function (i, d){
                        htmldata += `<tr>
                                        <td class="align-middle text-center text-sm"> `+d.id+` </td>
                                        <td class="mb-0 text-sm"> `+d.nombre+` </td><!--class="text-xs text-secondary mb-0"-->
                                        <td class="mb-0 text-sm"> `+d.apellido_1+` </td>
                                        <td class="mb-0 text-sm"> `+d.apellido_2+` </td>
                                        <td class="mb-0 text-sm"> `+d.curp+` </td>
                                        <td class="mb-0 text-sm"> `+d.rfc+` </td>
                                        <td class="mb-0 text-sm"> `+d.genero+` </td> 
                                        <td class="align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary mb-0 "
                                                    data-bs-toggle="dropdown" id="opciones"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="opciones1">
                                                    <li>
                                                        <a  onclick="ver(`+d.id+`)" class="dropdown-item" href="#">
                                                            <i class="fas fa-eye"></i> Visualizar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a  onclick="editar(`+d.id+`)" class="dropdown-item" href="#">
                                                            <i class="fas fa-edit"></i> Editar registro
                                                        </a>
                                                    </li>
                                                    
                                                    <li>
                                                    <a  onclick="eliminar(`+d.id+`)" class="dropdown-item" href="#">
                                                            <i class="fas fa-trash"></i> Eliminar registro
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        
                                    </tr>`;
                    });
                    $('#table-body').html(htmldata);
                    // Swal.fire(
                    //     'Nuevo registro',
                    //     'Se ha agregado un nuevo genero correctamente',
                    //     'success'
                    //     );
                    // alert('Se ha agregado un nuevo registro!');
                },
                error:function( data ) {
                    //alert('jjola'+data);
                    //mjseNotif("Error", "No se pueden cargar los datos2", "negative");
                },
            });                 
    }

</script>

@endsection

@section('page-scripts')
<script src="{{ asset('js/scripts/modal/components-modal.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <script src="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script>

    $(document).ready(function () {
       var accion = <?PHP echo (!empty($accion) ? $accion : '""'); ?>;
       console.log('accion: '+accion);
       if(accion != ""){
        switch (accion) {
            case 'success':
                Swal.fire(
                        'Nuevo registro',
                        'Se ha agregado una nueva persona correctamente',
                        'success'
                        );
                break;
        
            default:
                break;
        }
       }
    });

   
</script>
@endsection