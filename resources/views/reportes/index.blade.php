@extends('layouts.app')
@section('title', $title)
@section('main')
    <div class="container">
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href={{ route('index') }}>Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('cursos.index') }}">Tutorias</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('cursos.detalle', $data['curso']->id) }}">Detalle
                                    Tutoria</a></li>
                            <li class="breadcrumb-item active"><a>Reporte Detallado</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-12 col-xxl-12 mb-5">
                <div class="card mb-5">
                    <!-- Details Start -->
                    <div class="card-body pt-0">
                        <br>
                        @if ($data->limite > $data['curso']->created_at)
                            <div class="text-success">
                                <h4 class="text-success">STATUS FINALIZADO</h4>
                            </div>
                        @else
                            <div class="text-danger">
                                <h4 class="text-danger">STATUS RETRASADO</h4>
                            </div>
                        @endif
                        </h4>
                        <h4 class="mb-3"><b>FECHA DE REGISTRO:</b>
                            {{ strtoupper(Carbon\Carbon::parse($data->created_at)->formatLocalized('%d %B %Y %H:%M:%S')) }}
                        </h4>
                        <h4 class="mb-3"><b>NOMBRE PROFESOR:</b> {{ strtoupper($data['user']->name) }}</h4>
                        <h4 class="mb-3"><b>NOMBRE CURSO:</b> {{ strtoupper($data['curso']->nombre) }}</h4>
                        <h4 class="mb-3"><b>DESCARGAR ARCHIVO:</b> <a
                                href="{{ route('reportes.download', $data->file) }}"><i data-cs-icon="download"
                                    class="mb-3 d-inline-block text-primary"></i></a></h4>
                    </div>
                    <!-- Details End -->
                </div>
                <!-- Comments Start -->
                <h2 class="small-title">Editar</h2>
                <div class="card">
                    <div class="card-body">
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
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="text" class="form-control" placeholder="Observaciones"
                                    aria-label="Observaciones" name="observaciones" value="{{ $data->descripcion }}" />
                                <label class="custom-file-upload btn-outline-primary">
                                    <input type="file" name="file" />
                                    <i data-cs-icon="file-text"></i>
                                </label>
                                <div class="text-center">
                                    <button class="btn btn-icon btn-icon-end btn-outline-primary" type="submit"
                                        id="BtnSubmit">
                                        <span>Actualizar</span>
                                        <i data-cs-icon="send"></i>
                                    </button>
                                </div>
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
                url: "{{ route('reporte.update') }}",
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
