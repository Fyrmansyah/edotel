<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ '/backoffice/assets/' }}"
    data-template="vertical-menu-template-free" lang="id" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>eDotel | Backoffice</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link type="image/x-icon" href="{{ '/backoffice/assets/img/favicon/favicon.ico' }}" rel="icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link href="{{ '/backoffice/assets/vendor/fonts/boxicons.css' }}" rel="stylesheet" />

    <!-- Core CSS -->
    <link class="template-customizer-core-css" href="{{ '/backoffice/assets/vendor/css/core.css' }}" rel="stylesheet" />
    <link class="template-customizer-theme-css" href="{{ '/backoffice/assets/vendor/css/theme-default.css' }}" rel="stylesheet" />
    <link href="{{ '/backoffice/assets/css/demo.css' }}" rel="stylesheet" />

    <!-- Vendors CSS -->
    <link href="{{ '/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' }}" rel="stylesheet" />

    <link href="{{ '/backoffice/assets/vendor/libs/apex-charts/apex-charts.css' }}" rel="stylesheet" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ '/backoffice/assets/vendor/js/helpers.js' }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ '/backoffice/assets/js/config.js' }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>

<body>
    @inertia

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ '/backoffice/assets/vendor/libs/jquery/jquery.js' }}"></script>
    <script src="{{ '/backoffice/assets/vendor/libs/popper/popper.js' }}"></script>
    <script src="{{ '/backoffice/assets/vendor/js/bootstrap.js' }}"></script>
    <script src="{{ '/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js' }}"></script>

    <script src="{{ '/backoffice/assets/vendor/js/menu.js' }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ '/backoffice/assets/vendor/libs/apex-charts/apexcharts.js' }}"></script>

    <!-- Main JS -->
    <script src="{{ '/backoffice/assets/js/main.js' }}"></script>

    <!-- Page JS -->
    <script src="{{ '/backoffice/assets/js/dashboards-analytics.js' }}"></script>

</body>

</html>
