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

    <!-- offcanvase menu -->
    <div class="offcanvas max-w-[1300px] transition-all">
        <div class="flex w-[100%] flex-col">
            <div class="rts__btstrp__offcanvase relative max-w-[1300px]">
                <div class="offcanvase__wrapper flex items-center md:bg-transparent lg:bg-[#2b2b2b]">
                    <div
                        class="left__side mobile__menu relative flex h-[100vh] min-w-[470px] max-w-[470px] flex-col justify-between gap-[20px] overflow-scroll overflow-x-hidden bg-[#1D1D1D] p-[50px_60px_35px_50px]">
                        <button class="close absolute right-[20px] top-[30px]" type="button">
                            <svg class="bi bi-x-lg" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#fff" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                            </svg>
                        </button>
                        <div class="offcanvase__top">
                            <div class="offcanvase__logo">
                                <a href='index.html'>
                                    <img alt="logo" :src="'/client/assets/images/logo/logo__two.svg'">
                                </a>
                            </div>
                            <p class="mt-[20px] text-white">
                                Welcome to Moonlit, where luxury meets comfort in the heart of canada. Since 1999, we have been
                                dedicated to providing.
                            </p>
                        </div>
                        <div class="offcanvase__mobile__menu">
                            <div class="mobile__menu__active"></div>
                        </div>
                        <div class="offcanvase__bottom">
                            <div class="flex flex-col gap-[15px]">
                                <div class="flex flex-col gap-[5px] text-white">
                                    <span class="h6">Phone</span>
                                    <a href="tel:+1234567890"><i class="flaticon-phone-flip"></i> +1234567890</a>
                                </div>
                                <div class="flex flex-col gap-[5px] text-white">
                                    <span class="h6">Email</span>
                                    <a class="flex items-center gap-2" href="mailto:info@hostie.com"><i
                                            class="flaticon-envelope relative top-1"></i>info@hostie.com</a>
                                </div>
                                <div class="flex flex-col gap-[5px] text-white">
                                    <span class="h6">Address</span>
                                    <a href="#"><i class="flaticon-marker"></i> 280 Augusta Avenue, M5T 2L9 Toronto,
                                        Canada</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right__side desktop__menu w-full">
                        <button class="close absolute right-[20px] top-[30px]" type="button">
                            <svg class="bi bi-x-lg" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#fff" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                            </svg>
                        </button>
                        <div class="rts__desktop__menu">
                            <nav class="desktop__menu offcanvas__menu">
                                <ul class="m-0 list-none p-0">
                                    <li class="slide has__children">
                                        <a class="slide__menu__item" href="#">Home
                                            <span class="toggle"></span>
                                        </a>
                                        <ul class="slide__menu">
                                            <li><a href='index.html'>Hotel One</a></li>
                                            <li><a href='index-2.html'>Luxury Hotel</a></li>
                                            <li><a href='index-3.html'>Apartment Hotel</a></li>
                                            <li><a href='index-4.html'>Mountain Hotel</a></li>
                                            <li><a href='index-5.html'>City Hotel</a></li>
                                            <li><a href='index-6.html'>Beach Hotel</a></li>
                                            <li><a href='index-dark.html'>Hotel Dark</a></li>
                                        </ul>
                                    </li>
                                    <li class="slide">
                                        <a class='slide__menu__item' href='about.html'>About us
                                        </a>
                                    </li>
                                    <li class="slide has__children">
                                        <a class="slide__menu__item" href="#">Rooms
                                            <span class="toggle"></span>
                                        </a>
                                        <ul class="slide__menu">
                                            <li><a href="room-one.html">Room One</a></li>
                                            <li><a href="room-two.html">Room Two</a></li>
                                            <li><a href="room-three.html">Room Three</a></li>
                                            <li><a href="room-four.html">Room Four</a></li>
                                            <li><a href='room-details-1.html'>Room Details One</a></li>
                                            <li><a href='room-details-2.html'>Room Details Two</a></li>
                                        </ul>
                                    </li>
                                    <li class="slide has__children">
                                        <a class="slide__menu__item" href="#">Blog
                                            <span class="toggle"></span>
                                        </a>
                                        <ul class="slide__menu">
                                            <li><a href='blog.html'>Blog</a></li>
                                            <li><a href='blog-details.html'>Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="slide has__children">
                                        <a class="slide__menu__item" href="#">Pages
                                            <span class="toggle"></span>
                                        </a>
                                        <ul class="slide__menu">
                                            <li><a href='resturant.html'>Resturant</a></li>
                                            <li><a href='gallery.html'>Gallery</a></li>
                                            <li><a href='service.html'>Service</a></li>
                                            <li><a href='event.html'>Event</a></li>
                                            <li><a href='activities.html'>Activities</a></li>
                                        </ul>
                                    </li>
                                    <li class="slide has__children">
                                        <a class='slide__menu__item' href='contact.html'>Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvase menu end -->
    <div class="offcanvas-backdrop fade"></div>

    <!-- plugin js -->
    <script src="{{ '/client/assets/js/plugins.min.js' }}"></script>
    <!-- custom js -->
    <script src="{{ '/client/assets/js/main.js' }}"></script>
</body>



</html>
