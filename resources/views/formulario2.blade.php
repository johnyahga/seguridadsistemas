@extends('layouts.contentIncludes2')
@section('title','Formulario personas')

@section('content')
<div class="container-fluid py-4 mt-3">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Formulario editar Personas</p>
                        <!-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> -->
                    </div>
                </div>
                <form action="{{ route('editar-personas') }}" method="GET">
                  @csrf
                <div class="card-body">
                    <p class="text-uppercase text-sm">DATOS PERSONALES</p>
                    <div class="row">
                        <div class="col-md-7" style="display:none;">
                        <div class="form-group">
                                <label for="example-text-input" class="form-control-label">ID</label>
                                <input class="form-control"  value="{{ $persona[0]->id }}" name="id_persona" type="text" placeholder="" required readonly>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="example-text-input" class="form-control-label">CURP</label>
                                <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $persona[0]->curp }}" maxlength="18" name="curp" type="text" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">RFC</label>
                                <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $persona[0]->rfc }}" maxlength="13" name="rfc" type="text" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nombre</label>
                                <input class="form-control" name="nombre" value="{{ $persona[0]->nombre }}" type="text" placeholder="Nombre de la persona" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Apellido Paterno</label>
                                <input class="form-control" name="apellido1" value="{{ $persona[0]->apellido_1 }}" type="text" placeholder="Jesse" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Apellido Materno</label>
                                <input class="form-control" name="apellido2" value="{{ $persona[0]->apellido_2 }}" type="text" placeholder="Lucky" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Genero</label>
                                <select class="form-select" name="id_genero" id="select-genero" aria-label="Default select example" required>
                                    <option>Seleccionar genero</option>
                                    @foreach($generos as $gen)
                                        @if($persona[0]->id_genero == $gen->id)
                                        <option value="{{ $gen->id }}" selected> {{ $gen->genero }} </option>
                                        @else
                                        <option value="{{ $gen->id }}"> {{ $gen->genero }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                         <!-- <div class="col-md-1">
                            <button type="button" style="margin-top:30px;" class="btn btn-primary btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div> -->

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Estado</label>
                                <input class="form-control" type="text" id="estado" name="estado" placeholder="">
                            </div>
                        </div>


                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">DATOS ADICIONALES</p>
                    <div class="row">
                        
                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email personal</label>
                                <input class="form-control" type="email" id="mail_personal" name="mail_personal" value="{{ $persona[0]->mail_personal }}" placeholder="email@example.com" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email institucional</label>
                                <input class="form-control" type="email" id="mail_instit" name="mail_instit" value="{{ $persona[0]->mail_instit }}"  placeholder="email@example.com" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Domicilio</label>
                                <input class="form-control" type="text" id="domicilio" name="domicilio" value="{{ $persona[0]->domicilio }}" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-right col-md-12 ">
                        <button class="btn btn-danger mt-4">Cancelar</button>
                        <button type="submit" class="btn btn-success mt-4 submit">Guardar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar genero</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body" id="form-registro">
            <form action="{{ route('insertar-genero') }}" method="POST"
              class="form form-vertical" enctype="multipart/form-data">
              @csrf
              <div class="form-body">
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="nombre_alumno">Nombre</label>
                      <input type="text" id="nombre_genero" class="form-control" name="nombre_genero" 
                      value="">
                    </div>
                  </div>
                  

                  <!-- <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-1 mb-1" id="registrar" disabled onclick="validarArchivo()">Registrar</button>
                    {{-- <a class="btn btn-light-secondary mr-1 mb-1" href="{{ url()->previous() }}"
                    role="button">Cancelar</a> --}}
                  </div> -->
                </div>
              </div>
            </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary submit" onclick="loadGeneros()">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<script src="{{ asset('js/scripts/modal/components-modal.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script>
    var tabla;

    $(document).ready(function () {
        // console.log('hola mundo');
        //fnLoad();
       //$('#tablaListado').DataTable();
       var accion = '<?PHP echo (!empty($accion) ? strval($accion) : '""'); ?>';
       var msg = '<?PHP printf( (!empty($errormsg) ? strval($errormsg) : '""') ); ?>';
        console.log('accion: '+accion);
       if(accion != ""){
        switch (accion) {
            case 'error':
                Swal.fire(
                        'Error al insertar registro',
                        msg,
                        'error'
                        );
                break;
        
            default:
                break;
        }
       }
    });

    function ValidateForm() {
        var formInvalid = false;
        $('#form_persona input').each(function() {
        if ($(this).val() === '') {
            formInvalid = true;
        }
        });
        return formInvalid;
    }

    $('#submit').click(function(){
        if(action == 1){
            $('#form_persona').submit();
        }else{
            window.location.href = '/personas';
        }
    });

    $('#btn_cancel').click(function(){
        $('#confirmarModal').modal('show');
        action = 2
        $('#confirmarModalLabel').html('Cancelar registro');
        $('#confirmarModalBody').html('¿Seguro que desea cancelar el registro de persona?');
    });

    $('#btn_confirm').click(function(){
        if(!ValidateForm()){
            $('#confirmarModal').modal('show');
        }
        action = 1;
        $('#confirmarModalLabel').html('Confirmar guardar registro');
        $('#confirmarModalBody').html('¿Seguro que desea registrar los datos?');
    });


    function loadGeneros(){
        if($('#nombre_genero').val() != ''){
            nombregen = $('#nombre_genero').val();
            $.ajax({
                method: "get",
                url: "insertar-genero",
                data: { nombre: nombregen },
                beforeSend: function() {
                    $('#nombre_genero').val('');
                    $('#exampleModal').modal('toggle');
                },
                success:function( data ) {
                    // console.log(registros2);
                    htmldata = "<option selected> Seleccionar genero </option>";
                    $.each( data, function (i, d){
                        htmldata += '<option value="'+ d.id +'"> '+ d.genero +' </option>';
                    });
                    $('#select-genero').html(htmldata);
                    Swal.fire(
                        'Nuevo registro',
                        'Se ha agregado un nuevo genero correctamente',
                        'success'
                        );
                    // alert('Se ha agregado un nuevo registro!');
                },
                error:function( data ) {
                    //alert('jjola'+data);
                    //mjseNotif("Error", "No se pueden cargar los datos2", "negative");
                },
            });
        }
    }

     function fnLoad(){ //Carga datos en dataTable
        $.ajax({
            method: "get",
            url: "get-generos",
            //data: { accion: 5 },
            dataType:"json",
            processData: false,
            contentType:false,
            beforeSend: function() {
            },
            success:function( data ) {
                // console.log(registros2);
                htmldata = "<option selected> Seleccionar genero </option>";
                $.each( data, function (i, d){
                    htmldata += '<option value="'+ g.id +'"> '+ d.genero +' </option>';
                });
                $('#select-genero').html(html);
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

<script>
    var tabla;

    $(document).ready(function () {
        console.log('hola mundo');
        //fnLoad();
       //$('#tablaListado').DataTable();
    });


    function loadGeneros(){
        if($('#nombre_genero').val() != ''){
            $.ajax({
                method: "get",
                url: "insertar-generos",
                data: { nombre: $('#nombre_genero').val() },
                dataType:"json",
                processData: false,
                contentType:false,
                beforeSend: function() {
                    $('#nombre_genero').val('');
                    $('#exampleModal').modal('toggle');
                },
                success:function( data ) {
                    // console.log(registros2);
                    htmldata = "<option selected> Seleccionar genero </option>";
                    $.each( data, function (i, d){
                        htmldata += '<option value="'+ d.id +'"> '+ d.genero +' </option>';
                    });
                    $('#select-genero').html(html);
                },
                error:function( data ) {
                    //alert('jjola'+data);
                    //mjseNotif("Error", "No se pueden cargar los datos2", "negative");
                },
            });
        }
    }

     function fnLoad(){ //Carga datos en dataTable
        $.ajax({
            method: "get",
            url: "get-generos",
            //data: { accion: 5 },
            dataType:"json",
            processData: false,
            contentType:false,
            beforeSend: function() {
            },
            success:function( data ) {
                // console.log(registros2);
                htmldata = "<option selected> Seleccionar genero </option>";
                $.each( data, function (i, d){
                    htmldata += '<option value="'+ g.id +'"> '+ d.genero +' </option>';
                });
                $('#select-genero').html(html);
            },
            error:function( data ) {
                //alert('jjola'+data);
                //mjseNotif("Error", "No se pueden cargar los datos2", "negative");
            },
        });
     } 

</script>

<!-- <script src="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">


@endsection