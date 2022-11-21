<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <!-- Scripts -->
    <script src="{{ asset('build/assets/app.c5d9e6c4.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('build/assets/app.525f5899.css') }}" rel="stylesheet">

    <link href="{{ asset('badmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('badmin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('badmin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('badmin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('badmin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('badmin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('badmin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('badmin/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Homework 2</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('user.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Users</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('disease-type.index') }}">
                    <i class="bi bi-menu-button-wide"></i>
                    <span>Disease Types</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('countries.index') }}">
                    <i class="bi bi-journal-text"></i>
                    <span>Countries</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " href="{{ route('diseases.index') }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Diseases</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="charts-chartjs.html">
                            <i class="bi bi-circle"></i><span>Chart.js</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-apexcharts.html">
                            <i class="bi bi-circle"></i><span>ApexCharts</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-echarts.html">
                            <i class="bi bi-circle"></i><span>ECharts</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="icons-bootstrap.html">
                            <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-remix.html">
                            <i class="bi bi-circle"></i><span>Remix Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-boxicons.html">
                            <i class="bi bi-circle"></i><span>Boxicons</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->


        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            {{ $slot }}
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('badmin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('badmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('badmin/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('badmin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('badmin/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('badmin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('badmin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('badmin/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('badmin/js/main.js') }}"></script>

</body>
</html>
