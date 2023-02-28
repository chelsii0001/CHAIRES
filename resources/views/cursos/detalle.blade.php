@extends('layouts.app')
@section('title', $title)
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
                <h2 class="small-title">Reportes</h2>
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
                                <a href="{{ route('reporte.detalle', $item->id) }}">
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
                                            @if ($data->limite > $item->created_at)
                                                <div class="text-success">
                                                    <b>STATUS FINALIZADO</b>
                                                </div>
                                            @else
                                                <div class="text-danger">
                                                    <b>STATUS RETRASADO</b>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
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
                        <form action="#0" method="post" id="form-submit" role="form">
                            @csrf
                            <div class="input-group mt-5">
                                @if (count($reportes) < 4)
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
                                @endif
                            </div>
                            <br>
                            <div class="text-center">
                                <div id="loading" class="alert-primary text-center hide"></div>
                                <div id="error" class="alert-danger text-center hide"></div>
                                <div id="success" class="alert-success text-center hide"></div>
                                <br>
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Comments End -->
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('#form-submit').submit(function(e) {
            e.preventDefault();
            $('#loading').show();
            $('#loading').text('CARGANDO....');
            $('#error').hide();
            $("#BtnSubmit").prop("disabled", true);
            let mensajes = [];
            let fd = new FormData(this);
            $.ajax({
                url: "{{ route('reportes.store') }}",
                data: fd,
                type: "POST",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                success: function(data) {
                    $('#success').text('ACTUALIZADO CORRECTAMENTE');
                    $('#success').show();
                    $("#BtnSubmit").prop("disabled", false);
                    $('#error').hide();
                    $('#loading').hide();
                    $(".print-error-msg").css('display', 'none');
                    setTimeout(location.reload(), 90000);
                    $("#form-submit").trigger("reset");

                },
                error: function(errors) {

                    $("#BtnSubmit").prop("disabled", false);
                    if (errors.status == 401) {
                        window.location.href = '/';
                    }
                    if (errors.status == 422) {
                        mensajes = errors.responseJSON.errors;
                        printErrorMsg(mensajes);
                    }
                    $('#error').text('OCURRIO UN ERROR');
                    $('#error').show();
                    $('#loading').hide();
                }

            });

        });

        function printErrorMsg(msg) {

            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });

        }
    </script>
@endsection
