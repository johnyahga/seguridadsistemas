@extends('layouts.contentIncludes2')
@section('title','Formulario personas')

@section('content')
<div class="container-fluid py-4 mt-3">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Formulario Personas</p>
                        <!-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> -->
                    </div>
                </div>
                <form id="form_persona" action="{{ route('insertar-persona') }}" method="POST">
                  @csrf
                <div class="card-body">
                    <p class="text-uppercase text-sm">Datos PERSONALES</p>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="example-text-input" class="form-control-label">CURP*</label>
                                <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="18" name="curp" id="curp" type="text" placeholder="" required>
                                <span class="spinner-border spinner-border-sm loader-curp" role="status" style="margin-left: 10px; margin-top:5px; display: none;" aria-hidden="true"></span>
                                <div class="invalid-feedbackCURP" style="color-text:red; margin-top:5px; margin-left:10px; display:none;">Formato de CURP invalido.</div>
                            </div>
                        </div>
                        
                        <!-- <div class="col-md-1">
                            <button type="button" style="margin-top:30px;" class="btn btn-primary btn-rounded btn-icon" onclick="buscarCURP()">
                                <i class="fa fa-search"></i>
                            </button>
                            <button type="button" style="margin-top:30px;" class="btn btn-primary btn-rounded btn-icon" onclick="soap()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">RFC*</label>
                                <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="13" name="rfc" id="rfc" type="text" placeholder="" required>
                                <span class="spinner-border spinner-border-sm loader-rfc" role="status" style="margin-left: 10px; margin-top:5px; display: none;" aria-hidden="true"></span>
                                <!-- <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> -->
                                <div class="invalid-feedbackRFC" style="color-text:red; margin-top:5px; margin-left:10px; display:none;">Formato de RFC invalido.</div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display:none;">
                        <div class="form-group">
                                <label for="example-text-input" class="form-control-label">timestamp</label>
                                <input class="form-control" name="tmp_curp" id="tmp_curp" type="text" placeholder="" required readonly>
                            </div>
                        </div>
                        <!-- <div class="col-md-1">
                            <button type="button" style="margin-top:30px;" class="btn btn-primary btn-rounded btn-icon" onclick="buscarRFC()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nombre*</label>
                                <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre de la persona" required readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Apellido Paterno*</label>
                                <input class="form-control" name="apellido1" id="apellido1" type="text" placeholder="Apellido Paterno" required readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Apellido Materno*</label>
                                <input class="form-control" name="apellido2" id="apellido2" type="text" placeholder="Apellido Materno" required readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Genero*</label>
                                <select class="form-select" name="id_genero" id="select-genero" aria-label="Default select example" required>
                                    <option selected>Seleccionar genero</option>
                                    @foreach($generos as $gen)
                                        <option value="{{ $gen->id }}"> {{ $gen->genero }} </option>
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
                                <label for="example-text-input" class="form-control-label">Estado*</label>
                                <input class="form-control" type="text" id="estado" name="estado" placeholder="" required readonly>
                            </div>
                        </div>

                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Datos adicionales*</p>
                    <div class="row">
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Correo Personal*</label>
                                <input class="form-control" type="email" id="mail_personal" name="mail_personal" placeholder="email@example.com" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Correo Institucional*</label>
                                <input class="form-control" type="email" id="mail_instit" name="mail_instit" placeholder="email@example.com" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Domicilio*</label>
                                <input class="form-control" type="text" id="domicilio" name="domicilio" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    </form>    
                    <div class="text-right col-md-12 ">
                        <div class="btn btn-danger mt-4" id="btn_cancel" data-toggle="modal" data-target="#confirmarModal">Cancelar</div>
                        <div class="btn btn-success mt-4" id="btn_confirm" data-toggle="modal" data-target="#confirmarModal">Guardar</div>
                    </div>
                </div>
                
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
    var action = 0;
    function padTo2Digits(num) {
        return num.toString().padStart(2, '0');
    }

    function formatDate(date) {
    return (
        [
        date.getFullYear(),
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
        ].join('-') +
        ' ' +
        [
        padTo2Digits(date.getHours()),
        padTo2Digits(date.getMinutes()),
        padTo2Digits(date.getSeconds()),
        ].join(':')
    );
    }

    // (mm/dd/yyyy hh:mm:ss)
    console.log(formatDate(new Date()));


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
                $('#curp').val('<?PHP printf( (!empty($datos['curp']) ? strval($datos['curp']) : '""') ); ?>');
                $('#rfc').val('<?PHP printf( (!empty($datos['rfc']) ? strval($datos['rfc']) : '""') ); ?>');
                $('#nombre').val('<?PHP printf( (!empty($datos['nombre']) ? strval($datos['nombre']) : '""') ); ?>');
                $('#apellido1').val('<?PHP printf( (!empty($datos['apellido1']) ? strval($datos['apellido1']) : '""') ); ?>');
                $('#apellido2').val('<?PHP printf( (!empty($datos['apellido2']) ? strval($datos['apellido2']) : '""') ); ?>');
                $('#select-genero').val('<?PHP printf( (!empty($datos['id_genero']) ? strval($datos['id_genero']) : '""') ); ?>');
                $('#estado').val('<?PHP printf( (!empty($datos['estado']) ? strval($datos['estado']) : '""') ); ?>');
                $('#mail_personal').val('<?PHP printf( (!empty($datos['mail_personal']) ? strval($datos['mail_personal']) : '""') ); ?>');
                $('#mail_instit').val('<?PHP printf( (!empty($datos['mail_instit']) ? strval($datos['mail_instit']) : '""') ); ?>');
                $('#domicilio').val('<?PHP printf( (!empty($datos['domicilio']) ? strval($datos['domicilio']) : '""') ); ?>');
                $('#tmp_curp').val('<?PHP printf( (!empty($datos['tmp_curp']) ? strval($datos['tmp_curp']) : '""') ); ?>');
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
            buscarCURP(this.value);
        }else{
            $('.invalid-feedbackCURP').css('display', 'block');
            $('#nombre').val('');
            $('#apellido1').val('');
            $('#apellido2').val('');
            $('#estado').val('');
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

    function buscarCURP(curp){
        $.ajax({
            type: "GET",
            url: '/buscar-curp',
            dataType: "xml",
            data: {
                pcurp: curp
            },
            contentType: "multipart/form-data",
            beforeSend: function () {
                $('.loader-curp').css('display', 'block');
            },
            success: function (data) {
                $('.loader-curp').css('display', 'none');
                console.log(data.getElementsByTagName('NombreS')[0].childNodes[0].nodeValue);
                var numEstados = [
			'Aguascalientes',
			'Baja California',
			'Baja California Sur',
			'Campeche',
			'Chiapas',
			'Chihuahua',
			'Coahuila de Zaragoza',
			'Colima',
			'Ciudad de México',
			 'Durango',
			 'Guanajuato',
			 'Guerrero',
			 'Hidalgo',
			 'Jalisco',
			 'Mexico',
			 'Michoacan de Ocampo',
			 'Morelos',
			 'Nayarit',
			 'Nuevo Leon',
			 'Oaxaca',
			 'Puebla',
			 'Queretaro de Arteaga',
			 'Quintana Roo',
			 'San Luis Potosi',
			 'Sinaloa',
			 'Sonora',
			 'Tabasco',
			 'Tamaulipas',
			 'Tlaxcala',
			 'Veracruz',
			 'Yucatan',
			 'Zacatecas'];
                $('#nombre').val(data.getElementsByTagName('NombreS')[0].childNodes[0].nodeValue);
                $('#nombre').css('border-color','gray');
                $('#apellido1').val(data.getElementsByTagName('Apellido1')[0].childNodes[0].nodeValue);
                $('#apellido1').css('border-color','gray');
                $('#apellido2').val(data.getElementsByTagName('Apellido2')[0].childNodes[0].nodeValue);
                $('#apellido2').css('border-color','gray');
                var genero = data.getElementsByTagName('Sexo')[0].childNodes[0].nodeValue;
                if(genero == "H")
                    $('#select-genero').val("1");
                else if(genero == "M")
                    $('#select-genero').val("2");
                else 
                    $('#select-genero').val("3");
                var numEst = data.getElementsByTagName('NumEntidadReg')[0].childNodes[0].nodeValue - 1;
                $('#estado').val(numEstados[numEst]);
                $('#estado').css('border-color','gray');
                $('#tmp_curp').val(formatDate(new Date()) + '.000000');

            },
            error: function (msg) {
                Swal.fire(
                        'Error al validar la CURP',
                        'Ha ocurrido un error al validar el dato CURP, intentelo más tarde',
                        'error'
                        );
                $('.loader-curp').css('display', 'none');

            }

        });
    }

    function buscarRFC2(){
        $.ajax({
            type: "GET",
            url: 'https://proyectoscete.tamaulipas.gob.mx/insumos/public/servicios/',
            // jsonpCallback: "MyCallbackDED",
            // dataType: "xml",
            data: {
                param0: 'UUIDcase234d',
                param1: 'LUGF8001149DA'
            },
            // processData: false,
            // CORS: true ,
            // secure: true,
            headers: {
                'usuario': 'rhcete',
                'contrasenia': 'P4$$W0rdrhc3te',
                'Content-Type': 'application/x-www-form-urlencoded'

            },
            contentType: "multipart/form-data",
            success: function (msg) {
                console.log(msg);
            },
            error: function (msg) {
                alert("Failed: " + msg.status + ": " + msg.statusText);
            }

        });
    }

    $('#form_persona input').on('change', function(){
        $(this).css('border-color', 'gray');
    })

    function ValidateForm() {
        var formInvalid = false;
        $('#form_persona input').each(function() {
        if ($(this).val() === '') {
            formInvalid = true;
            $(this).css('border-color', 'red');
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

    function buscarCURP2(){
        var soapMessage = `<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tem="http://tempuri.org/">
                            <soap:Header/>
                            <soap:Body>
                                <tem:Consulta_por_CURP>
                                    <!--Optional:-->
                                    <tem:Curp>GAGJ990916HTSRNN04</tem:Curp>
                                    <tem:id_Valor>11</tem:id_Valor>
                                    <!--Optional:-->
                                    <tem:Cadena>M3hx¡#¡nhU3a?LX</tem:Cadena>
                                </tem:Consulta_por_CURP>
                            </soap:Body>
                            </soap:Envelope>`;
                           
        var url = "https://sce.tamaulipas.gob.mx/WS_RENAPO_V2/Consulta_curp.asmx?wsdl";
        // $.support.cors = true;
        $.ajax({
            type: "post",
            url: url,
            // jsonpCallback: "MyCallbackDED",
            dataType: "text/xml",
            contentType: "text/xml; charset=utf-8",
            data: soapMessage,
            // data: {
            //     Curp: 'GAGJ990916HTSRNNP4',
            //     id_valor: 11,
            //     Cadena: 'M3hx¡#¡nhU3a?LX'
            // },
            processData: false,
            crossDomain: true,
            // CORS: true ,
            // secure: true,
            headers: {
                // 'Access-Control-Allow-Origin': '*',
                // 'Access-Control-Allow-Methods': 'DELETE, POST, GET, OPTIONS',
                // 'Access-Control-Allow-Headers': 'Content-Type, Authorization, X-Requested-With'
                // 'content-type': "text/xml; charset=utf-8"
            },
            success: function (msg) {
                console.log(msg);
            },
            error: function (msg) {
                // alert("Failed: " + msg.status + ": " + msg.statusText);
                // alert("Failed: " + msg);
                // console.log(msg);
            }

        });
    }

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