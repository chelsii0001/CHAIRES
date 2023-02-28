@extends('layouts.app')
@section('title', $title)
@section('style')
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>
@endsection
@section('main')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href={{ route('index') }}>Dashboard</a></li>
                            <li class="breadcrumb-item">Cursos</li>
                            <li class="breadcrumb-item active"><a>{{ $title }}</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row">
            <div class="col-12 col-xl-12 col-xxl-12 mb-5">
                <div class="card mb-5">
                    <!-- Carousel Start -->
                    <div class="card-body p-0">
                        <div class="glide glide-gallery" id="glidePortfolioDetail">
                            <!-- Large Images Start -->
                            <div class="glide glide-large">
                                <div class="glide__track text-center" data-glide-el="track">
                                    <img src="{{ asset('assets/img/avatars/' . $data->img) }}" alt=""
                                        class="text-center" style="width: 20%;">
                                </div>
                            </div>
                            <!-- Large Images End -->
                        </div>
                    </div>
                    <!-- Carousel End -->

                    <!-- Details Start -->
                    <div class="card-body pt-0">
                        <h4 class="mb-3"><b>NOMBRE:</b> {{ strtoupper($data->nombre) }}</h4>
                        <h4 class="mb-3"><b>{{ $data->tipo == 1 ? 'TUTOR' : 'ASESOR' }} ASIGNADO:</b>
                            {{ strtoupper($data['tutor']->nombre) }}</h4>
                        <h4 class="mb-3"><b>GRUPO ASIGNADO:</b> {{ strtoupper($data['grupo']->nombre) }}</h4>
                        <h4 class="mb-3"><b>PERIODO INICIO: </b>
                            {{ strtoupper(Carbon\Carbon::parse($data->inicio)->formatLocalized('%d %B %Y')) }}</h4>
                        <h4 class="mb-3"><b>PERIODO FIN: </b>
                            {{ strtoupper(Carbon\Carbon::parse($data->fin)->formatLocalized('%d %B %Y')) }}</h4>
                        <div class="mb-4">
                            <p>
                                {{ $data->descripcion }}
                            </p>
                        </div>
                        <div class="row align-items-center">
                            <!-- Comments and Likes Start -->
                            <div class="col-6 text-muted">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <i data-cs-icon="message" class="text-primary me-1" data-cs-size="15"></i>
                                        <span class="align-middle">{{ count($reportes) }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comments and Likes End -->
                        </div>
                    </div>
                    <!-- Details End -->
                </div>
                <!-- Comments Start -->
                <h2 class="small-title">Reporte Mensual</h2>
                <div class="card">
                    <div class="card-body">

                        @if (count($mensual) == 0)
                            <div class="text-center">
                                <form data-action="{{ route('asesoria.mensual.reportes.store') }}" method="POST"
                                    id="form-submit-mensual">
                                    @csrf
                                    <div class="input-group mt-5">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <input type="text" class="form-control" placeholder="Observaciones"
                                            aria-label="Observaciones" name="observaciones" />
                                        <label class="custom-file-upload btn-outline-primary">
                                            <input type="file" name="file" />
                                            <i data-cs-icon="file-text"></i>
                                        </label>
                                        <div class="text-center">
                                            <button class="btn btn-icon btn-icon-end btn-outline-primary" type="submit"
                                                id="BtnSubmit-mensual">
                                                <span>Guardar</span>
                                                <i data-cs-icon="send"></i>
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        @endif
                        @if (count($mensual) > 0)
                            <div class="">
                                @foreach ($mensual as $m)
                                    <div class="d-flex align-items-center pb-3 mt-3">
                                        <div class="row g-0 w-100">
                                            <div class="col-auto">
                                                <div class="sw-5 me-3">
                                                    <img src="{{ asset('assets/img/avatars/users/' . $m['user']->img) }}"
                                                        class="img-fluid rounded-xl" alt="thumb" />
                                                </div>
                                            </div>
                                            <div class="col pe-3">
                                                <a href="#0">{{ strtoupper($m['user']->name) }}</a>
                                                <div class="text-muted text-small mb-2">
                                                    {{ $m->created_at->diffForHumans() }}
                                                </div>
                                                <div class="text-medium text-alternate lh-1-25">
                                                    {{ strtoupper($m->descripcion) }}</div>
                                                <div class="text-medium text-alternate lh-1-25">
                                                    <a href="{{ route('reportes.download', $m->file) }}"><i
                                                            data-cs-icon="download"
                                                            class="mb-3 d-inline-block text-primary"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif
                    </div>
                </div>
                <!-- Comments End -->
                <hr>
                <!-- Comments Start -->
                <h2 class="small-title">Evidencias</h2>
                <div class="card">
                    <div class="card-body">

                        @if (count($reportes) == 4)
                            <div class="text-center">
                                YA SE CUMPLIERON CON LOS 4 REPORTES
                            </div>
                        @endif
                        @if (count($reportes) == 0)
                            <div class="text-center">
                                NO HAY REGISTROS
                            </div>
                        @else
                            @foreach ($reportes as $item)
                                <div class="d-flex align-items-center pb-3 mt-3">
                                    <div class="row g-0 w-100">
                                        <div class="col-auto">
                                            <div class="sw-5 me-3">
                                                <img src="{{ asset('assets/img/avatars/users/' . $item['user']->img) }}"
                                                    class="img-fluid rounded-xl" alt="thumb" />
                                            </div>
                                        </div>
                                        <div class="col pe-3">
                                            <a href="#">{{ strtoupper($item['user']->name) }}</a>
                                            <div class="text-muted text-small mb-2">
                                                {{ $item->created_at->diffForHumans() }}
                                            </div>
                                            <div class="text-medium text-alternate lh-1-25">
                                                {{ strtoupper($item->descripcion) }}</div>
                                            <div class="text-medium text-alternate lh-1-25">
                                                <a href="{{ route('reportes.download', $item->file) }}"><i
                                                        data-cs-icon="download"
                                                        class="mb-3 d-inline-block text-primary"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <form data-action="{{ route('asesoria.reportes.store') }}" method="POST"
                            id="form-submit-reporte">
                            @csrf
                            <div class="input-group mt-5">

                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="text" class="form-control" placeholder="Observaciones"
                                    aria-label="Observaciones" name="observaciones" />
                                <label class="custom-file-upload btn-outline-primary">
                                    <input type="file" name="file" />
                                    <i data-cs-icon="file-text"></i>
                                </label>
                                <div class="text-center">
                                    <button class="btn btn-icon btn-icon-end btn-outline-primary" type="submit"
                                        id="BtnSubmit">
                                        <span>Guardar</span>
                                        <i data-cs-icon="send"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <br>
                @include('layouts.alerts')
                <!-- Comments End -->
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/form-post.js') }}"></script>
@endsection
