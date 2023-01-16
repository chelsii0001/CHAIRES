<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>PORTAL TESI IXTAPALUCA</title>
    <meta name="description" content="PORTAL TESI IXTAPALUCA" />

    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/font/CS-Interface/style.css') }}" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/OverlayScrollbars.min.css') }}" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <script src="{{ asset('assets/js/base/loader.js') }}"></script>
</head>

<body class="h-100">
    <div id="root" class="h-100">
        <!-- Background Start -->
        <div class="fixed-background"></div>
        <!-- Background End -->

        <div class="container-fluid p-0 h-100 position-relative">
            <div class="row g-0 h-100">
                <!-- Left Side Start -->
                <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
                    <div class="min-h-100 d-flex align-items-center">
                        <div class="w-100 w-lg-75 w-xxl-50">
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left Side End -->

                <!-- Right Side Start -->
                <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
                    <div
                        class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
                        <div class="sw-lg-50 px-5">
                            <div class="sh-11 text-center">
                                <a href="#0" class="text-center">
                                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt=""
                                        class="text-center">
                                </a>
                            </div>
                            <div class="mb-5">
                                <h2 class="cta-1 mb-0 text-primary">Bienvenido,</h2>
                                <h2 class="cta-1 text-primary">Empezemos!</h2>
                            </div>
                            <div class="mb-5">
                                <p class="h6">Utilice sus credenciales para iniciar sesión.</p>
                            </div>
                            <div>
                                <form id="loginForm" class="tooltip-end-bottom" method="post"
                                    action="{{ route('authlogin') }}">
                                    @if ($alert = Session::get('error'))
                                        <div class="alert alert-warning text-center">
                                            {{ $alert }}
                                        </div>
                                    @endif
                                    @csrf
                                    <div class="mb-3 filled form-group tooltip-end-top">
                                        <i data-cs-icon="user"></i>
                                        <input class="form-control" placeholder="Usuario" name="user" required />
                                    </div>
                                    <div class="mb-3 filled form-group tooltip-end-top">
                                        <i data-cs-icon="lock-off"></i>
                                        <input class="form-control pe-7" name="password" type="Password"
                                            placeholder="Password" required />
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary">Entrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Side End -->
            </div>
        </div>
    </div>


    <!-- Vendor Scripts Start -->
    <script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/autoComplete.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/clamp.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.barrating.min.js') }}"></script>
    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="{{ asset('assets/font/CS-Line/csicons.min.js') }}"></script>
    <script src="{{ asset('assets/js/base/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/base/globals.js') }}"></script>
    <script src="{{ asset('assets/js/base/nav.js') }}"></script>
    <script src="{{ asset('assets/js/base/search.js') }}"></script>
    <script src="{{ asset('assets/js/base/settings.js') }}"></script>
    <script src="{{ asset('assets/js/base/init.js') }}"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->
    <script src="{{ asset('assets/js/pages/dashboard.visual.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Page Specific Scripts End -->
</body>

</html>
