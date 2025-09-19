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

    <!-- back to top -->
    <button class="rts__back__top" id="rts-back-to-top" type="button">
        <svg width="20" height="20" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M7.30201 1.51317L7.29917 21.3422C7.29912 21.7057 6.97211 21.9993 6.5674 21.9993C6.16269 21.9992 5.83577 21.7055 5.83582 21.342L5.83844 3.10055L1.39753 7.08842C1.11169 7.34511 0.647535 7.34506 0.361762 7.0883C0.0759894 6.83155 0.0760493 6.41464 0.361896 6.15795L6.05367 1.04682C6.26405 0.857899 6.5773 0.802482 6.85167 0.905201C7.12374 1.00792 7.30205 1.24823 7.30201 1.51317Z"
                fill="#FFF" />
            <path
                d="M12.9991 6.6318C12.9991 6.80021 12.9282 6.96861 12.7841 7.09592C12.4983 7.35261 12.0341 7.35256 11.7483 7.0958L6.05118 1.97719C5.76541 1.72043 5.76547 1.30352 6.05131 1.04684C6.33716 0.790152 6.80131 0.790206 7.08709 1.04696L12.7842 6.16557C12.9283 6.29498 12.9991 6.46339 12.9991 6.6318Z"
                fill="#FFF" />
        </svg>
    </button>
    <!-- Modal Background (Overlay) -->
    <div class="bg-heading fixed z-[99999] flex items-center justify-center bg-opacity-25 shadow-sm" id="registerModal">
        <div class="relative">
            <div class="modal-content min-w-[350px] max-w-[350px] bg-white p-[40px] md:min-w-[600px] md:max-w-[600px]">
                <div class="max-w-full">
                    <div class="mb-4 flex items-center justify-between">
                        <h6 class="text-heading mb-0 text-center">Create a Free Account</h6>
                        <button class="btn-close" type="button" aria-label="Close">
                            <svg class="bi bi-x-lg" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                            </svg>
                        </button>
                    </div>
                    <form class="flex flex-col gap-4" action="https://moonlit-tailwind.netlify.app/candidate-dashboard.html"
                        method="post">

                        <div class="form-group">
                            <label class="text-heading mb-2 block text-gray-800" for="name">Your Name</label>
                            <div class="relative">
                                <input
                                    class="w-full rounded-[4px] border border-[rgba(125,128,135,0.3)] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    id="name" name="name" type="text" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-heading mb-2 block text-gray-800" for="email-popup">Your Email</label>
                            <div class="relative">
                                <input
                                    class="w-full rounded-[4px] border border-[rgba(125,128,135,0.3)] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    id="email-popup" name="email-popup" type="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-heading mb-2 block text-gray-800" for="password">Password</label>
                            <div class="relative">
                                <input
                                    class="w-full rounded-[4px] border border-[rgba(125,128,135,0.3)] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    id="password" name="password" type="password" placeholder="Enter your password" required>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="form-check flex items-center gap-2">
                                <input class="form-check-input h-4 w-4 rounded border-gray-300 text-indigo-600"
                                    id="flexCheckDefault" type="checkbox">
                                <label class="form-check-label text text-gray-600" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>
                            <a class="text-sm text-gray-600 hover:text-indigo-500" data-bs-toggle="modal"
                                data-bs-target="#forgotModal" href="#">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                            <button
                                class="bg-primary w-full rounded-[4px] p-[10px_0] text-white transition hover:bg-indigo-700">Login</button>
                        </div>
                    </form>
                    <p class="mt-4 text-center text-sm text-gray-600">Don’t have an account? <a
                            class="text-indigo-600 hover:text-indigo-500" data-bs-target="#signupModal" data-bs-toggle="modal"
                            href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

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
