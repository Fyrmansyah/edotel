<!DOCTYPE html>
<html lang="id">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Moonlit - Hotel and Resort HTML Template">
    <meta name="keywords" content="hotel, resort, Spa">
    <meta name="robots" content="index, follow">
    <!-- for open graph social media -->
    <meta property="og:title" content="Hotel and Resort">
    <meta property="og:description" content="Moonlit - Hotel and Resort HTML Template">
    <!-- for twitter sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Hotel and Resort">
    <meta name="twitter:description" content="Moonlit - Hotel and Resort HTML Template">
    <!-- favicon -->
    <link type="image/x-icon" href="{{ '/client/assets/images/favicon.ico' }}" rel="icon">
    <!-- title -->
    <title>eDotel | Client</title>

    <!-- icon font from flaticon -->
    <link href="{{ '/client/assets/fonts/flaticon_bokinn.css' }}" rel="stylesheet">
    <!-- all plugin css -->
    <link href="{{ '/client/assets/css/plugins.min.css' }}" rel="stylesheet">
    <!-- main style custom css -->
    <link href="{{ '/client/assets/css/style.css' }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>

<body>
    @inertia

    <!-- plugin js -->
    <script src="{{ '/client/assets/js/plugins.min.js' }}"></script>
    <!-- custom js -->
    <script src="{{ '/client/assets/js/main.js' }}"></script>
</body>



</html>
