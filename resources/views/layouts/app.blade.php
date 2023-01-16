<!DOCTYPE html>
<html lang="es" data-footer="true">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Tesi Ixtapaluca @yield('title')</title>
    <meta name="description"
        content="A dashboard implementation that mainly has visual items such as banners, call to action buttons and stats." />

    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/font/CS-Interface/style.css') }}" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/OverlayScrollbars.min.css') }}" />
    @yield('style')

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <script src="{{ asset('assets/js/base/loader.js') }}"></script>
</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex">
            <div class="nav-content d-flex">
                <!-- Logo Start -->
                <div class="logo position-relative">
                    <a href="{{ route('/') }}">
                        <div>
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                        </div>
                    </a>
                </div>
                <!-- Logo End -->

                <!-- User Menu Start -->
                <div class="user-container d-flex">
                    <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="profile" alt="profile"
                            src="{{ asset('assets/img/avatars/users/' . Auth::user()->img) }}" />
                        <div class="name">{{ Auth::user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end user-menu wide">
                        <div class="row mb-3 ms-0 me-0 text-center">
                            <div class="col-12 ps-1 mb-2">
                                <div class="text-extra-small text-primary">Cuenta</div>
                            </div>
                            <div class="col-12 ps-1 pe-1">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">Perfil</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-1 ms-0 me-0 text-center">
                            <div class="col-12 p-1 mb-3 pt-3">
                                <div class="separator-light"></div>
                            </div>
                            <div class="col-12 pe-1 ps-1">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="dropdown-item" href="javascript:;"><i data-cs-icon="logout"
                                                class="me-2" data-cs-size="17"></i><span>Salir</span></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Menu End -->

                <!-- Icons Menu Start -->
                <ul class="list-unstyled list-inline text-center menu-icons">
                    <li class="list-inline-item">
                        <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true"
                            aria-expanded="false" class="notification-button">
                            <div class="position-relative d-inline-flex">
                                <i data-cs-icon="bell" data-cs-size="18"></i>
                                <span class="position-absolute notification-dot rounded-xl"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out"
                            id="notifications">
                            <div class="scroll">
                                <ul class="list-unstyled border-last-none">

                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- Icons Menu End -->

                <!-- Menu Start -->
                @include('layouts.menu')
                <!-- Menu End -->

                <!-- Mobile Buttons Start -->
                <div class="mobile-buttons-container">
                    <!-- Scrollspy Mobile Button Start -->
                    <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                        <i data-cs-icon="menu-dropdown"></i>
                    </a>
                    <!-- Scrollspy Mobile Button End -->

                    <!-- Scrollspy Mobile Dropdown Start -->
                    <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
                    <!-- Scrollspy Mobile Dropdown End -->

                    <!-- Menu Button Start -->
                    <a href="#" id="mobileMenuButton" class="menu-button">
                        <i data-cs-icon="menu"></i>
                    </a>
                    <!-- Menu Button End -->
                </div>
                <!-- Mobile Buttons End -->
            </div>
            <div class="nav-shadow"></div>
        </div>

        <main>
            <div class="container">
                @yield('main')
            </div>
        </main>

        <!-- Layout Footer Start -->
        <footer>
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <p class="mb-0 text-muted text-medium">Chaires {{ now()->year }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Layout Footer End -->
    </div>

    <!-- Theme Settings Modal End -->


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
    @yield('script')
    <!-- Page Specific Scripts End -->
</body>

</html>
