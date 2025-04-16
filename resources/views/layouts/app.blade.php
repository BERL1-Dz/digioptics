<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>DigiOptics | Dashboard </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <img src="{{ asset('assets/img/logo.jpg') }}" style="width: 200px;">
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li id="dash" class="menu-item">
                        <a href="/" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Layouts -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Fichiers &amp; Informations</span>
                    </li>
                    <li class="menu-item" id='open'>
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-receipt"></i>
                            <div data-i18n="Form Elements">Dossier</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ url('/patient') }}" class="menu-link">
                                    <div data-i18n="Basic Inputs">Patient</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('facture.index') }}" class="menu-link">
                                    <div data-i18n="Input groups">Facture</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="{{ url('/correction') }}" class="menu-link">
                                    <div data-i18n="Input groups">Correction
                                    </div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/fournisseur') }}" class="menu-link">
                                    <div data-i18n="Input groups">Fournisseur
                                    </div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="{{ url('/categorie') }}" class="menu-link">
                                    <div data-i18n="Input groups">Categorie
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item" id='open'>
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bxs-file-doc'></i>
                            <div data-i18n="Form Elements">Devis</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ url('/achat') }}" class="menu-link">
                                    <div data-i18n="Basic Inputs">Achat</div>
                                </a>
                            </li>
                           

                            <li class="menu-item">
                                <a href="/" class="menu-link">
                                    <div data-i18n="Input groups">Vente
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Stock</span></li>
                    <!-- User interface -->
                    <li class="menu-item">
                        <a href="{{ url('/verre') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-bullseye"></i>
                            <div data-i18n="Basic">Verre</div>
                        </a>
                    </li>
                    <!-- Extended components -->
                    <li class="menu-item">
                        <a href="{{ url('/lentille') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-circle"></i>
                            <div data-i18n="Basic">Lentilles</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ url('/monture') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-glasses"></i>
                            <div data-i18n="Basic">Montures</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ url('/accessoire') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Accessoires</div>
                        </a>
                    </li>
                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Divers</span></li>
                    <li class="menu-item">
                        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                            target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-support"></i>
                            <div data-i18n="Support">Support Technique</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                            target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Documentation">Documentation</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('opticien-info.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div>Information Opticien</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.navigation')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                @yield('content')
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets/js/facture-form.js') }}"></script>

    <!-- GitHub Buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Dashboard Active Menu -->
    <script>
        if (location.pathname.split('/')[1] === '') {
            document.querySelector('#dash').classList.add('active')
        }
    </script>
</body>

</html>
