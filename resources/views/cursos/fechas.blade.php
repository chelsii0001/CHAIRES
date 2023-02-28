@extends('layouts.app')
@section('title', $title)
@section('style')
@endsection
@section('main')
    <div class="container">
        <!-- Title Start -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href={{ route('index') }}>Dashboard</a></li>
                            <li class="breadcrumb-item"><a>Registros</a></li>
                            <li class="breadcrumb-item active"><a>{{ $title }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Title End -->
        <!-- Address Start -->
        <section class="scroll-section" id="address">
            <h2 class="small-title">Registro</h2>
            <form class="tooltip-end-top" data-action="{{ route('grupo.store.asignacion') }}" method="POST"
                id="form-submit">
                @csrf
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="mb-3 top-label">
                                    <input type="date" class="form-control" name="uno" />
                                    <span>FECHA DE ENTREGA PATH</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-3 top-label">
                                    <input type="date" class="form-control" name="dos" />
                                    <span>SEGUNDO REPORTE MENSUAL</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-3 top-label">
                                    <input type="date" class="form-control" name="tres" />
                                    <span>TERCER REPORTE MENSUAL</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-3 top-label">
                                    <input type="date" class="form-control" name="cuatro" />
                                    <span>CUARTO REPORTE MENSUAL</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-3 top-label">
                                    <input type="date" class="form-control" name="cinco" />
                                    <span>REPORTE SEMESTRAL Y CONCENTRADO GENERAL DE ALUMNOS</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                        <div>
                            <button class="btn btn-icon btn-icon-end btn-primary" type="#" id="BtnSubmit">
                                <span>Guardar</span>
                                <i data-cs-icon="chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    <br>
                    @include('layouts.alerts')
                </div>
            </form>
        </section>
        <!-- Address End -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/controls.datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/form-post.js') }}"></script>

@endsection
