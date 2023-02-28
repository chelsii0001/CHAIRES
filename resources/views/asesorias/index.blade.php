@extends('layouts.app')
@section('title', $title)
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
                            <li class="breadcrumb-item active"><a>{{ $title }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Title End -->

        <div class="row text-center">
            <div class="col-12 col-xl-12 col-xxl-12 mb-5">
                <!-- Grid Start -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-2 mb-5">
                    @foreach ($data as $item)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset('assets/img/avatars/' . $item->img) }}" class="card-img-top sh-19"
                                    alt="card image" />
                                <div class="card-body">
                                    <h5 class="heading mb-3">
                                        <a href="{{ route('asesorias.detalle', $item->id) }}"
                                            class="body-link stretched-link">

                                            <span class="clamp-line sh-5"
                                                data-line="2">{{ strtoupper($item->nombre) }}</span>
                                            <span class="clamp-line sh-5" data-line="2">ASIGNADO A:
                                                {{ strtoupper($item['tutor']->nombre) }}</span>
                                            <small>Fecha Inicio
                                                {{ Carbon\Carbon::parse($item->inicio)->formatLocalized('%d %B %Y') }}</small>
                                            <br>
                                            <small>Fecha Final
                                                {{ Carbon\Carbon::parse($item->fin)->formatLocalized('%d %B %Y') }}</small>
                                        </a>
                                    </h5>
                                    <div>
                                        <div class="row g-0">
                                            <div class="col">
                                                <i data-cs-icon="clock" class="text-primary me-1" data-cs-size="15"></i>
                                                <span class="align-middle">{{ $item->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row g-0">
                                            <div class="col">
                                                <button class="btn btn-info" href="#0">EDITAR</button>
                                                <button class="btn btn-danger" href="#0">ELIMINAR</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Grid End -->
            </div>

        </div>
    </div>
@endsection
