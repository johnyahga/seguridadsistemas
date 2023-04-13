@extends('layouts.contentIncludes')
@section('title','Concurso de dibujo')

@section('content')

<div class="container-fluid py-4 mt-3">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Registrados</p>
                <h3 class="font-weight-bolder">
                  {{ $total_registrados }}
                </h3>
                <!-- <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+55%</span>
                  since yesterday
                </p> -->
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Seleccionados</p>
                <h3 class="font-weight-bolder">
                {{ $total_seleccionados }}
                </h3>
                <!-- <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+3%</span>
                  since last week
                </p> -->
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">No Seleccionados</p>
                <h3 class="font-weight-bolder">
                {{ $total_Noseleccionados }}
                </h3>
                <!-- <p class="mb-0">
                  <span class="text-danger text-sm font-weight-bolder">-2%</span>
                  since last quarter
                </p> -->
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Evaluados</p>
                <h3 class="font-weight-bolder">  <!-- tenia h5 -->
                {{ $total_evaluados }}
                </h3>
                <!-- <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                </p> -->
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card ">
        <div class="card-header pb- p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">Registros</h6>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FOLIO (ID)</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CURP/NOMBRE</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MUNICIPIO/REGION</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CCT/ESCUELA</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NOMBRE DIBUJO</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ESTATUS</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @if($registros->count() >= 2)
                  @foreach($registros as $registro)
                      <tr >
                          <td class="align-middle text-center text-sm"> {{ $registro->folio . " (" . $registro->id_registro_concurso . ")"  }} </td>
                          <td class="mb-0 text-sm"> 
                            <h6 class="mb-0 text-sm">{{ $registro->curp }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $registro->nombre_alumno ." ". $registro->ap_paterno ." ". $registro->ap_materno }}</p>  
                          </td><!--class="text-xs text-secondary mb-0"-->
                          <td class="mb-0 text-sm"> 
                            <p class="text-xs font-weight-bold mb-0">Municipio</p>
                            <p class="text-xs text-secondary mb-0">Region</p> 
                          </td>
                          <td class="mb-0 text-sm"> 
                            <p class="text-xs font-weight-bold mb-0">{{ $registro->cct }} </p>
                            <p class="text-xs text-secondary mb-0">{{ $registro->nombre_cct  }} </p> 
                          </td>
                          <td class="mb-0 text-sm"> 
                            {{ $registro->nombre_personaje }}
                          </td>
                          <td class="text-sm">  <!--class="badge badge-sm bg-success  bg-secondary"-->
                            @if ($registro->estatus_id==1) <span class="">Registrado</span> 
                            @elseif ($registro->estatus_id==2) <span class="">Seleccionado</span>
                            @elseif ($registro->estatus_id==3) <span class="">No Seleccionado</span>
                            @endif
                        </td>
                        <td class="align-middle">
                          <div class="dropdown">
                              <button class="btn btn-link text-secondary mb-0 "
                                  data-bs-toggle="dropdown" id="opciones"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                  <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="opciones1">
                                  <li>
                                      <a  v-if="can('btn_update_registro') && screen != null" 
                                          v-on:click="ver( {{ $registro->id_registro_concurso}} )" class="dropdown-item" href="#">
                                          <i class="fas fa-eye"></i> Ver
                                      </a>
                                  </li>
                                  <li>
                                      <a  v-if="can('btn_update_registro') && screen == null" 
                                          v-on:click="editar(option)" class="dropdown-item" href="#">
                                          <i class="fas fa-edit"></i> Editar
                                      </a>
                                  </li>
                                  <li>
                                      <a v-on:click="descargarPdf(option)"  class="dropdown-item" href="#">
                                          <i class="fas fa-download"></i> Descargar PDF
                                      </a>
                                  </li>
                                  
                                  <li>
                                      <a v-if="option.deleted_at === null && (can('btn_delete_registro') || can('btn_delete_emergencia'))"
                                          v-on:click="metodoGenerico(option, 'registro.delete', 'Registro borrado')" class="dropdown-item">
                                          <i class="fas fa-trash"></i> Borrar
                                      </a>
                                  </li>
                                  <li>
                                      <a v-if="option.deleted_at !== null" v-on:click="metodoGenerico(option, 'registro.restore', 'Registro restaurado')" class="dropdown-item">
                                          <i class="fa fa-recycle" aria-hidden="true"></i> Restaurar
                                      </a>
                                  </li>
                              </ul>
                          </div>
                        </td>
                      </tr>
                  @endforeach
              @elseif( $registros->count()==1)
                <tr >
                  <td class="align-middle text-center text-sm"> {{ $registro->folio . " (" . $registro->id_registro_concurso . ")"  }} </td>
                  <td class="mb-0 text-sm"> 
                    <h6 class="mb-0 text-sm">{{ $registro->curp }}</h6>
                    <p class="text-xs text-secondary mb-0">{{ $registro->nombre_alumno ." ". $registro->ap_paterno ." ". $registro->ap_materno }}</p>  
                  </td><!--class="text-xs text-secondary mb-0"-->
                  <td class="mb-0 text-sm"> 
                    <p class="text-xs font-weight-bold mb-0">Municipio</p>
                    <p class="text-xs text-secondary mb-0">Region</p> 
                  </td>
                  <td class="mb-0 text-sm"> 
                    <p class="text-xs font-weight-bold mb-0">{{ $registro->cct }} </p>
                    <p class="text-xs text-secondary mb-0">{{ $registro->nombre_cct  }} </p> 
                  </td>
                  <td class="mb-0 text-sm"> 
                    {{ $registro->nombre_personaje }}
                  </td>
                  <td class="text-sm">  <!--class="badge badge-sm bg-success  bg-secondary"-->
                    @if ($registro->estatus_id==1) <span class="">Registrado</span> 
                    @elseif ($registro->estatus_id==2) <span class="">Seleccionado</span>
                    @elseif ($registro->estatus_id==3) <span class="">No Seleccionado</span>
                    @endif
                  </td>
                  <td class="align-middle">
                    <div class="dropdown">
                        <button class="btn btn-link text-secondary mb-0 "
                            data-bs-toggle="dropdown" id="opciones"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="opciones1">
                            <li>
                                <a  v-if="can('btn_update_registro') && screen != null" 
                                    v-on:click="ver( {{ $registro->id_registro_concurso}} )" class="dropdown-item" href="#">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                            <li>
                                <a  v-if="can('btn_update_registro') && screen == null" 
                                    v-on:click="editar(option)" class="dropdown-item" href="#">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </li>
                            <li>
                                <a v-on:click="descargarPdf(option)"  class="dropdown-item" href="#">
                                    <i class="fas fa-download"></i> Descargar PDF
                                </a>
                            </li>
                            
                            <li>
                                <a v-if="option.deleted_at === null && (can('btn_delete_registro') || can('btn_delete_emergencia'))"
                                    v-on:click="metodoGenerico(option, 'registro.delete', 'Registro borrado')" class="dropdown-item">
                                    <i class="fas fa-trash"></i> Borrar
                                </a>
                            </li>
                            <li>
                                <a v-if="option.deleted_at !== null" v-on:click="metodoGenerico(option, 'registro.restore', 'Registro restaurado')" class="dropdown-item">
                                    <i class="fa fa-recycle" aria-hidden="true"></i> Restaurar
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
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Alumno</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body" id="form-registro">
            <form action="{{ route('alumno.guardarRegistro') }}" method="POST"
              class="form form-vertical" enctype="multipart/form-data">
              @csrf
              <div class="form-body">
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="curp">Curp</label>
                      <input type="text" id="curp" class="form-control" name="curp" value="{{ old('curp') }}" readonly>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="nombre_alumno">Nombre</label>
                      <input type="text" id="nombre_alumno" class="form-control" name="nombre_alumno" readonly 
                      value="{{ old('nombre_alumno') }}">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="ap_paterno">Apellido paterno</label>
                      <input type="text" id="ap_paterno" class="form-control" name="ap_paterno" 
                        maxlength="30" readonly value="{{ old('ap_paterno') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="ap_materno">Apellido materno</label>
                      <input type="text" id="ap_materno" class="form-control" name="ap_materno" 
                        maxlength="90" readonly value="{{ old('ap_materno') }}">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="escuela">Escuela</label>
                      <input type="text" id="escuela" class="form-control" name="escuela"  maxlength="90"
                        readonly value="{{ old('escuela') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="gradoEscolar">Grado escolar</label>
                      <input type="text" id="gradoEscolar" class="form-control" name="gradoEscolar" 
                        maxlength="30" readonly value="{{ old('gradoEscolar') }}">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="nombre_municipio">Municipio</label>
                      <input type="text" id="nombre_municipio" class="form-control" name="nombre_municipio" 
                        maxlength="90" readonly value="{{ old('nombre_municipio') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="telefono_titular">Teléfono</label>
                      <input type="number" id="telefono_titular" class="form-control"
                        name="telefono_titular" value="{{ old('telefono_titular') }}" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="domicilio_casa">Dirección</label>
                      <input type="text" id="domicilio_casa" class="form-control"
                        name="domicilio_casa" value="{{ old('domicilio_casa') }}" readonly>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="correo_titular">Correo electrónico</label>
                      <input type="email" id="correo_titular" class="form-control"
                        name="correo_titular" value="{{ old('correo_titular') }}" readonly>
                    </div>
                  </div>

                  <hr style="border: 1px solid #727e8c60" class="col-11">

                  <p><h6 class="modal-title">Datos del Dibujo</h6></p>
                  
                  <hr style="border: 1px solid #727e8c60" class="col-11">

                  <div class="col-6">
                    <div class="form-group">
                      <label for="nombre_personaje">Nombre del personaje</label>
                      <input type="text" id="nombre_personaje"
                        class="form-control" name="nombre_personaje"
                        value="{{ old('nombre_personaje') }}" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="valores_personaje">Valores del superhéroe o superheroína</label>
                      <input type="text" id="valores_personaje"
                        class="form-control" name="valores_personaje"
                        value="{{ old('valores_personaje') }}" readonly>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="descripcion_personaje">Breve descripción del personaje</label>
                      <input type="text" id="descripcion_personaje"
                        class="form-control"
                        name="descripcion_personaje" value="{{ old('descripcion_personaje') }}" readonly>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="">Archivo </label>
                      <!-- <label for="getFileDibujo"
                        class="btn btn-primary btn-block glow my-2 add-file-btn text-capitalize"><i
                          class="bx bx-plus"></i>Agregar archivo</label>
                      <input type="file" class="d-none @error('getFileDibujo') is-invalid @enderror" id="getFileDibujo"
                        name="getFileDibujo" > -->
                      <!-- <span style="color: #ab0033; display: none;" id="archivoCargadoError">Falta cargar el archivo de imagen</span>
                      <span style="color: #ab0033; display: none;" id="archivoCargado">Archivo cargado</span> -->
                      <button id="verImagen" type="button" class="btn btn-secondary"
                        data-toggle="modal" data-target="#exampleModalScrollable">Ver imagen</button>
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->
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

  function ver(){
    alert('hola')
  }
  $(document).ready(function () {
    alert('hola')
    });
    /*var tabla;

    $(document).ready(function () {
        fnLoad();
       $('#tablaListado').DataTable();
    });

     function fnLoad(data){ //Carga datos en dataTable
        $.ajax({
            method: "get",
            url: "show",
            //data: { accion: 5 },
            dataType:"json",
            processData: false,
            contentType:false,
            beforeSend: function() {
            },
            success:function( data ) {
                console.log(registros2);
                //alert(data);
                if(data.status=="Ok"){
                    //console.log(data.resultado);
                    tablaListado(data.resultado);
                }else{
                    //mjseNotif("Advertencia", "No se econtraron registros", "warning");
                }
                //var data = JSON.parse(data.resultado);
                //tablaListado(data);
            },
            error:function( data ) {
                //alert('jjola'+data);
                //mjseNotif("Error", "No se pueden cargar los datos2", "negative");
            },
        });
    } 

     function tablaListado(daata){
        if(tabla){
            $('#tablaListado2').DataTable().clear().destroy();
        }
        tabla=$('#tablaListado2').DataTable({
            data: daata.data,
            initComplete: function(){
                $('#tablaListado2').show();
            },
            columns: [
                { data: 'id_registro_concurso' },
                { data: 'curp' },
                 { data: null, render:function(data){
                        return '<i class="eye blue icon" onClick="fnAccion('+data.id+',1)"></i>'+ //Ver
                        '&nbsp;&nbsp; <i class="pencil green icon" onClick="fnAccion('+data.id+',2)"></i>'+ //Editar
                        '&nbsp;&nbsp; <i class="trash red icon" onClick="fnEliminar('+data.id_registro_concurso+',3)"></i>'; //Eliminar
                    }
                }, 
            ],
            columnDefs:[
                {
                    targets: [0,1,2,3,4,5,6,7],
                    //className: 'text-center',
                    //sortable: false
                },{
                    //targets: [6], //oculta campo activo
                    visible: false,
                    //searchable: false
            }],
            language: {
                search: "Buscar",
                lengthMenu: "Mostrando _MENU_ registros",
                zeroRecords: "No se encuentran registros",
                info: "Mostrando _PAGE_ de _PAGES_",
                infoEmpty: "No se encuentran registros",
                infoFiltered: "(filtrado desde _MAX_ total de registros)",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                },
            }
        });
    }
 */
</script>
@endsection