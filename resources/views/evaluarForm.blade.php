@extends('layouts.contentIncludes2')
@section('title','Concurso de dibujo')

@section('content')
<div class="container-fluid py-4 mt-3">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Evaluar</p>
                        <!-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> -->
                    </div>
                </div>
                <div class="card-body">
                    <!-- <p class="text-uppercase text-sm">Técnica</p> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="example-text-input" class="form-control-label">Técnica</label> -->
                                <label for="example-text-input" class="form-control-label text-uppercase text-sm">Técnica </label>
                                <!-- <input class="form-control" type="text" value="lucky.jesse"> -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbTecnica" id="rbTecnica1" value="1" checked>
                                    <label class="form-check-label" for="rbTecnica1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbTecnica" id="rbTecnica2" value="2">
                                    <label class="form-check-label" for="rbTecnica2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbTecnica" id="rbTecnica3" value="3">
                                    <label class="form-check-label" for="rbTecnica3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbTecnica" id="rbTecnica4" value="4">
                                    <label class="form-check-label" for="rbTecnica4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbTecnica" id="rbTecnica5" value="5">
                                    <label class="form-check-label" for="rbTecnica5">5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Representación de la región</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbRegion" id="rbRegion1" value="1" checked>
                                    <label class="form-check-label" for="rbRegion1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbRegion" id="rbRegion2" value="2">
                                    <label class="form-check-label" for="rbRegion2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbRegion" id="rbRegion3" value="3">
                                    <label class="form-check-label" for="rbRegion3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbRegion" id="rbRegion4" value="4">
                                    <label class="form-check-label" for="rbRegion4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbRegion" id="rbRegion5" value="5">
                                    <label class="form-check-label" for="rbRegion5">5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Descripción del personaje</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbPersonaje" id="rbPersonaje1" value="1" checked>
                                    <label class="form-check-label" for="rbPersonaje1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbPersonaje" id="rbPersonaje2" value="2">
                                    <label class="form-check-label" for="rbPersonaje2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbPersonaje" id="rbPersonaje3" value="3">
                                    <label class="form-check-label" for="rbPersonaje3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbPersonaje" id="rbPersonaje4" value="4">
                                    <label class="form-check-label" for="rbPersonaje4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbPersonaje" id="rbPersonaje5" value="5">
                                    <label class="form-check-label" for="rbPersonaje5">5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Originalidad</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbOriginalidad" id="rbOriginalidad1" value="1" checked>
                                    <label class="form-check-label" for="rbOriginalidad1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbOriginalidad" id="rbOriginalidad2" value="2">
                                    <label class="form-check-label" for="rbOriginalidad2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbOriginalidad" id="rbOriginalidad3" value="3">
                                    <label class="form-check-label" for="rbOriginalidad3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbOriginalidad" id="rbOriginalidad4" value="4">
                                    <label class="form-check-label" for="rbOriginalidad4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbOriginalidad" id="rbOriginalidad5" value="5">
                                    <label class="form-check-label" for="rbOriginalidad5">5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right col-md-12 ">
                        <button class="btn btn-danger mt-4">Cancelar</button>

                        <a class="btn btn-danger mt-4" onclick="fnCancelar()">Cancelar</a>
                        <button class="btn btn-success mt-4">Guardar</button>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
<script src="{{ asset('js/scripts/modal/components-modal.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script>
    // $(document).ready(function () {
    //     //fnCancelar
    // });

    function fnCancelar(){
        alert('cancelar');
    }
</script>
@endsection