@extends('layouts.app')
@section('title', 'Dashboard')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap-datepicker3.standalone.min.css') }}" />
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
                            <li class="breadcrumb-item"><a>Tutorias</a></li>
                            <li class="breadcrumb-item active"><a>{{ $title }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Title End -->
        <!-- section Start -->
        <section class="scroll-section" id="address">
            <h2 class="small-title">Registro</h2>
            <form class="tooltip-end-top" data-action="{{ route('cursos.store') }}" method="POST" id="form-submit">
                @csrf
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="mb-3 top-label">
                                    <input class="form-control" name="nombre" required />
                                    <span>NOMBRE</span>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="mb-3 form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="TUTOR" name="tutor"
                                        required>
                                        <option value="" selected disabled>SELECCIONAR TUTOR</option>
                                        @foreach ($tutores as $t)
                                            <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">TUTOR</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="TIPO DE CARGO"
                                        name="tipo" required>
                                        <option value="" selected disabled>SELECCIONAR CARGO</option>
                                        <option value="1">TUTORIA</option>
                                        <option value="2">ASESORIOA</option>
                                    </select>
                                    <label for="floatingSelect">TIPO DE CARGO</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 form-floating">
                                    <select class="form-select" id="floatingSelect2" aria-label="GRUPO" name="grupo"
                                        required>
                                        <option value="" selected disabled>SELECCIONAR GRUPO</option>
                                        @foreach ($grupos as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect2">GRUPO</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-3 top-label">
                                    <input type="date" class="form-control" name="inicio" />
                                    <span>PERIODO INICIO</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-3 top-label">
                                    <input type="date" class="form-control" name="fin" />
                                    <span>PERIODO FIN </span>
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
        <!-- section End -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/controls.datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/form-post.js') }}"></script>

@endsection
