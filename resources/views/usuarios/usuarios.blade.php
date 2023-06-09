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
            <div>
              <button type="button" class="btn btn-primary" id="btn_nuevo">Nuevo Usuario</button>
            </div>
        </div>
        <!-- descomentar en caso de que falle el responsive -->
        <!-- <div class="table-responsive"> -->
        <!-- comentar en caso de que falle el responsive -->
        <div class="">
            <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Persona asociada</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de registro</th> -->
                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de modificación</th> -->
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody id="table-body">
                    @if(count($registros) >= 2)
                        @foreach($registros as $registro)
                            <tr >
                                <td class="align-middle text-center text-sm"> {{ $registro->id }} </td>
                                <td class="mb-0 text-sm"> {{ $registro->user_name }} </td>
                                <td class="mb-0 text-sm"> {{ $registro->nombre_persona }} </td>
                                <td class="mb-0 text-sm"> {{ $registro->estado ? 'Activo' : 'Inactivo' }} </td>
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
                                            <a  onclick="activarDesactivar({{$registro->id}},{{ $registro->estado ? 1 : 0 }})" class="dropdown-item" href="#">
                                                    <i class="fas fa-power-off"></i> {{ $registro->estado ? 'Desactivar' : 'Activar' }} usuario
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
                            <td class="mb-0 text-sm"> {{ $registros[0]->user_name }} </td><!--class="text-xs text-secondary mb-0"-->
                            <td class="mb-0 text-sm"> {{ $registros[0]->nombre_persona }} </td>
                            <td class="mb-0 text-sm"> {{ $registros[0]->estado ? 'Activo' : 'Inactivo' }} </td>
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
                                              <a  onclick="activarDesactivar({{$registros[0]->id}},{{ $registros[0]->estado ? 1 : 0 }})" class="dropdown-item" href="#">
                                                <i class="fas fa-power-off"></i> {{ $registros[0]->estado ? 'Desactivar' : 'Activar' }} usuario
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

<!-- MODAL Registro -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="d-flex justify-content-center" >
      <!-- <span class="fa fa-spinner fa-spin fa-3x" style="" id="loaderVista"></span> -->
      </div>
      <div class="card-body" id="form-registro">
            <form method="POST"
              class="form form-vertical" enctype="multipart/form-data">
              <div class="form-body">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Persona*</label>
                        <select class="form-select" name="id_persona" id="select-persona" aria-label="Default select example" required>
                            <!-- <option selected>Seleccionar persona</option> -->
                        </select>
                        <span class="spinner-border spinner-border-sm loader-personas" role="status" style="margin-left: 10px; margin-top:5px; display: none;" aria-hidden="true"></span>                        
                    </div>
                  </div>

                  <div class="col-6" style="display:none;">
                    <div class="form-group">
                      <label for="id_usuario">ID</label>
                      <input type="text" id="id_usuario" class="form-control" name="id_usuario" value="" readonly>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="user_name">Usuario</label>
                      <input type="text" id="user_name" class="form-control" name="user_name" value="" readonly>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="pass">Contraseña</label>
                      <input type="password" id="pass" class="form-control" name="pass" value="" >
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
        <button type="button" class="btn btn-primary" id="btn_modificar">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL Registro -->

<!-- MODAL Ver -->
<div class="modal fade" id="modalVisualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de Usuario</h5>
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
                      <label for="user_name">Usuario</label>
                      <input type="text" id="verUser" class="form-control" name="verUser" value="" readonly>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label for="verPersona">Persona</label>
                      <input type="text" id="verPersona" class="form-control" name="verPersona" value="" readonly>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label for="verCURP">CURP</label>
                      <input type="text" id="verCURP" class="form-control" name="verCURP" value="" readonly>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label for="VerEstado">Estado del usuario</label>
                      <input type="text" id="verEstado" class="form-control" name="" readonly 
                      value="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="verFecha1">Fecha de registro</label>
                      <input type="text" id="verFecha1" class="form-control" name="" 
                        readonly value="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label for="vetFecha2">Fecha de modificación</label>
                      <input type="text" id="verFecha2" class="form-control" name="" 
                        readonly value="">
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
        <h5 class="modal-title" id="text-title-modal">Confirmar accion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#confirmarModal').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="msj-modal">¿Seguro que quieres desactivar este usuario?</div>
        <input type="hidden" id="id_usuario_accion" name="id_usuario_accion" value=""/>
        <input type="hidden" id="estado_usuario" name="estado_usuario" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#confirmarModal').modal('hide');">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="desactivarUser()" >Confirmar</button>
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
                        'Usuario desactivado',
                        'Se ha desactivado el usuario correctamente',
                        'success'
                        );
                    actualizarTabla();
                },
                error:function( ) {
                    
                },
            });  
    }

    

    $('#btn_nuevo').on('click', function(){
      $('#pass').val('');
      $('#user_name').val('');
      $('#modalRegistro').modal('show');
      $('#btn_guardar').css('display','block');
      $('#btn_modificar').css('display','none');
        $.ajax({
                method: "get",
                url: "get-personas",
                // data: { id_usuario: id },
                beforeSend: function() {
                  $('.loader-personas').css('display','block');
                },
                success:function(data) {
                  $('.loader-personas').css('display','none');
                  html_options = "<option selected> Seleccionar persona </option>";
                  $.each( data, function (i, d){
                        html_options += `<option value=`+d.id+`>` + d.nombre +` `+d.apellido_1+ ` `+d.apellido_2+`</option>`;
                    });
                    $('#select-persona').html(html_options);
                },
                error:function( ) {
                    
                },
        });
    });

    function ver(id){
        $('#modalVisualizar').modal('show');
        $('#loaderVista').css('display','block');
        $.ajax({
                method: "get",
                url: "usuarios/get-usuario",
                data: { id_usuario: id },
                beforeSend: function() {

                },
                success:function(data) {
                  $('#loaderVista').css('display','none');
                    $('#verUser').val(data[0].user_name);
                    $('#verPersona').val(data[0].nombre_persona);
                    if(data[0].estado)
                      $('#verEstado').val('Activo');
                    else
                      $('#verEstado').val('Inactivo');
                    $('#verFecha1').val(data[0].fecha_registro);
                    $('#verFecha2').val(data[0].fecha_modifica);
                    $('#verCURP').val(data[0].curp);
                },
                error:function( ) {
                    
                },
            });  
    }

    $( "#select-persona" )
        .change(function () {
          var id = 0;
          $( "select option:selected" ).each(function() {
            id += $( this ).val();
          });
          $.ajax({
                method: "get",
                url: "get-persona",
                data: {
                  id_persona: id
                },
                beforeSend: function() {
                    console.log(id);
                },
                success:function( data ) {
                  $('#user_name').val(data[0].mail_instit);
                }});
          // $( "div" ).text( str );
        }).change();

        $('#btn_modificar').on('click', function(){
          $.ajax({
                method: "get",
                url: "/usuarios/actualizar-usuarios",
                data: { id_persona: $('#select-persona').val(),
                        id_usuario: $('#id_usuario').val(),
                        user_name: $('#user_name').val(),
                        pass: $('#pass').val() },
                beforeSend: function() {
                  $('#modalRegistro').modal('hide');
                },
                success:function(data) {
                  Swal.fire(
                        'Usuario actualizado',
                        'Se ha actualizado el usuario correctamente',
                        'success'
                        );
                        actualizarTabla();
                },
                error:function( ) {
                    
                },
          });
        });

        $('#btn_guardar').on('click', function(){
          $.ajax({
                method: "get",
                url: "/usuarios/insertar-usuarios",
                data: { id_persona: $('#select-persona').val(),
                        user_name: $('#user_name').val(),
                        pass: $('#pass').val() },
                beforeSend: function() {
                  $('#modalRegistro').modal('hide');
                },
                success:function(data) {
                  Swal.fire(
                        'Usuario registrado',
                        'Se ha registrado un nuevo usuario correctamente',
                        'success'
                        );
                        actualizarTabla();
                },
                error:function( ) {
                    
                },
          });
        })

    function editar(id_usuario){
      $('#pass').val('');
      $('#user_name').val('');
      $('#id_usuario').val(id_usuario);
      $('#modalRegistro').modal('show');
      $('#btn_guardar').css('display','none');
      $('#btn_modificar').css('display','block');
      $.ajax({
                method: "get",
                url: "get-personas",
                // data: { id_usuario: id },
                beforeSend: function() {
                  $('.loader-personas').css('display','block');
                },
                success:function(data) {
                  $('.loader-personas').css('display','none');
                  html_options = "<option selected> Seleccionar persona </option>";
                  $.each( data, function (i, d){
                        html_options += `<option value=`+d.id+`>` + d.nombre +` `+d.apellido_1+ ` `+d.apellido_2+`</option>`;
                    });

                    $('#select-persona').html(html_options);

                    $.ajax({
                      method: "get",
                      url: "usuarios/get-usuario",
                      data: {
                        id_usuario: id_usuario,
                      },
                      beforeSend: function() {

                      },
                      success:function( data2 ) {
                        $('#select-persona').val(data2[0].id_persona);
                        $('#user_name').val(data2[0].user_name);
                        $('#pass').val('0000000000');
                      }
                    });
                },
                error:function( ) {
                    
                },
        });
    }

    function desactivarUser(){
      $.ajax({
        method: "get",
        url: "usuarios/desactivar-usuario",
        data: {
          id_usuario: $('#id_usuario_accion').val(),
          estado: $('#estado_usuario').val()
        },
        beforeSend: function() {
          $('#confirmarModal').modal('hide');
        },
        success:function( data ) {
          actualizarTabla();
          if($('#estado_usuario').val() == 1)
            state = "desactivado";
          else
            state = "activado";
          Swal.fire(
                        'Usuario '+state,
                        'Se ha '+state+' el usuario correctamente',
                        'success'
                        );
        }
      });
    }

    function activarDesactivar(id, estado){
      $('#confirmarModal').modal('show');
      var msj="activar";
      if(estado){
        msj="desactivar";
      }

      $('#id_usuario_accion').val(id);
      $('#estado_usuario').val(estado);
      $('.msj-modal').html('¿Seguro que quieres ' +msj+ ' este usuario?');
      // $('#msj-modal').html('¿Seguro que quieres desactivar este usuario?');
    }

    function actualizarTabla(){
        $.ajax({
                method: "get",
                url: "/usuarios/get-usuarios",
                beforeSend: function() {
                    console.log('hola');
                },
                success:function( data ) {
                    htmldata = "";
                    $.each( data, function (i, d){
                        nameEstado="";
                        if(d.estado)
                          nameEstado = 'Activo'; 
                        else
                          nameEstado = 'Inactivo'; 
                        htmldata += `<tr>
                                        <td class="align-middle text-center text-sm"> `+d.id+` </td>
                                        <td class="mb-0 text-sm"> `+d.user_name+` </td><!--class="text-xs text-secondary mb-0"-->
                                        <td class="mb-0 text-sm"> `+d.nombre_persona+` </td>
                                        <td class="mb-0 text-sm"> `+nameEstado+` </td>
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
                                                    <a  onclick="activarDesactivar(`+d.id+`, ${ d.estado ? 1 : 0 } )" class="dropdown-item" href="#">
                                                            <i class="fas fa-power-off"></i>  ${d.estado ? 'Desactivar' : 'Activar'}  usuario
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        
                                    </tr>`;
                    });
                    $('#table-body').html(htmldata);
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