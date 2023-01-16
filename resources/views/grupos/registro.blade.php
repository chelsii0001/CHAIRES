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
            <form class="tooltip-end-top" id="form-submit" role="form">
                @csrf
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="mb-3 top-label">
                                    <input class="form-control" name="nombre" required />
                                    <span>NOMBRE</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 top-label">
                                    <input class="form-control" name="descripcion" required />
                                    <span>DESCRIPCION</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 form-floating">
                                    <select class="form-select" id="floatingSelect2" aria-label="carrera" name="carrera"
                                        required>
                                        <option value="" selected disabled>SELECCIONAR CARRERA</option>
                                        @foreach ($carreras as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect2">CARRERA</label>
                                </div>
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
                    <div class="col-md-12">
                        <div class="text-center" style="text-align:center;">
                            <div id="loading" class="alert-primary text-center hide"></div>
                            <div id="error" class="alert-danger text-center hide"></div>
                            <div id="success" class="alert-success text-center hide"></div>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- Address End -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('#BtnSubmit').click(function(e) {
            $('#loading').show();
            $('#success').hide();
            $('#loading').text('CARGANDO....');
            $('#error').hide();
            $("#BtnSubmit").prop("disabled", true);
            let mensajes = [];
            e.preventDefault();
            $.ajax({
                url: "{{ route('grupo.store') }}",
                data: $("#form-submit").serialize(),
                type: "POST",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                success: function(data) {
                    $('#success').text('GUARDADO CORRECTAMENTE');
                    $('#success').show();
                    $("#form-submit").trigger("reset");
                    $("#BtnSubmit").prop("disabled", false);
                    $('#error').hide();
                    $('#loading').hide();
                    $(".print-error-msg").css('display', 'none');

                },
                error: function(errors) {
                    $('#success').hide();
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
