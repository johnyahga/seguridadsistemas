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
                <form id="form_persona" action="{{ route('editar-personas') }}" method="GET">
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
                                <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $persona[0]->curp }}" maxlength="18" name="curp" id="curp" type="text" placeholder="" required>
                                <div class="invalid-feedbackCURP" style="color-text:red; margin-top:5px; margin-left:10px; display:none;">Formato de CURP invalido.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">RFC</label>
                                <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $persona[0]->rfc }}" maxlength="13" name="rfc" id="rfc" type="text" placeholder="" required>
                                <div class="invalid-feedbackRFC" style="color-text:red; margin-top:5px; margin-left:10px; display:none;">Formato de RFC invalido.</div>
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
                        <div class="btn btn-danger mt-4" id="btn_cancel" data-toggle="modal" data-target="#confirmarModal">Cancelar</div>
                        <div type="submit" class="btn btn-success mt-4 submit" id="btn_confirm" data-toggle="modal" data-target="#confirmarModal">Guardar</div>
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

<!-- Modal Confirmar -->
<div class="modal fade" id="confirmarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmarModalLabel">Confirmar guardar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#confirmarModal').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="confirmarModalBody">
        ¿Seguro que desea registrar los datos?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#confirmarModal').modal('hide');">Cancelar</button>
        <button type="button" class="btn btn-primary" id="submit" >Confirmar</button>
      </div>
    </div>
  </div>
</div>

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

    function curpValida(curp) {

        var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
            validado = curp.match(re);

        if (!validado)  //Coincide con el formato general?
            return false;

        //Validar que coincida el dígito verificador
        function digitoVerificador(curp17) {
            //Fuente https://consultas.curp.gob.mx/CurpSP/
            var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                lngSuma      = 0.0,
                lngDigito    = 0.0;
            for(var i=0; i<17; i++)
                lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
            lngDigito = 10 - lngSuma % 10;
            if (lngDigito == 10) return 0;
            return lngDigito;
        }

        if (validado[2] != digitoVerificador(validado[1])) 
            return false;

        return true; //Validado
    }

    function rfcValido(rfc, aceptarGenerico = true) {
        const re       = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
        var   validado = rfc.match(re);

        if (!validado)  //Coincide con el formato general del regex?
            return false;

        //Separar el dígito verificador del resto del RFC
        const digitoVerificador = validado.pop(),
            rfcSinDigito      = validado.slice(1).join(''),
            len               = rfcSinDigito.length,

        //Obtener el digito esperado
            diccionario       = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
            indice            = len + 1;
        var   suma,
            digitoEsperado;

        if (len == 12) suma = 0
        else suma = 481; //Ajuste para persona moral

        for(var i=0; i<len; i++)
            suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
        digitoEsperado = 11 - suma % 11;
        if (digitoEsperado == 11) digitoEsperado = 0;
        else if (digitoEsperado == 10) digitoEsperado = "A";

        //El dígito verificador coincide con el esperado?
        // o es un RFC Genérico (ventas a público general)?
        if ((digitoVerificador != digitoEsperado)
        && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
            return false;
        else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
            return false;
        return rfcSinDigito + digitoVerificador;
    }

    $("#curp").keyup(function(){
        // console.log(this.value);
        if(this.value == ''){
            $('.invalid-feedbackCURP').css('display', 'none');
            return 0;
        }
        if(curpValida(this.value)){
            $('.invalid-feedbackCURP').css('display', 'none');
            $('#curp').css('border-color', 'green');
        }else{
            $('.invalid-feedbackCURP').css('display', 'block');
            $('#curp').css('border-color', 'red');
        }
    });

    $("#rfc").keyup(function(){
        // console.log(this.value);
        if(this.value == ''){            
            $('.invalid-feedbackRFC').css('display', 'none');
            return 0;
        }
        if(rfcValido(this.value)){
            $('.invalid-feedbackRFC').css('display', 'none');
            $('#rfc').css('border-color', 'green');
        }else{
            $('.invalid-feedbackRFC').css('display', 'block');
            $('#rfc').css('border-color', 'red');
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