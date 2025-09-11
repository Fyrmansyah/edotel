<template>
    <div class="bg-heading">
        <!-- header top -->
        <div class="border-b-[.5px] border-[#65676b33] text-white hidden sm:block">
            <div class="container mx-auto py-[10px]">
                <div class="flex items-center justify-between">
                    <div class="flex gap-[25px]">
                        <a class="flex gap-[10px] items-center text-xs" href="callto:#"
                            ><i class="flaticon-phone-flip relative top-[3px]"></i> +12505550199</a
                        >
                        <a class="flex gap-[10px] items-center text-xs" href="mailto:#"
                            ><i class="flaticon-envelope relative top-[3px]"></i>
                            moonlit@gmail.com</a
                        >
                    </div>
                    <div>
                        <a class="flex gap-[10px] items-center text-xs" href="#"
                            ><i class="flaticon-marker relative top-[2px]"></i>280 Augusta Avenue,
                            M5T 2L9 Toronto, Canada</a
                        >
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- header menu -->
        <div class="header transition header__function is__home__3">
            <div class="container">
                <div
                    class="grid grid-cols-2 lg:grid-cols-3 justify-center items-center py-4 lg:py-0"
                >
                    <div class="logo flex items-center justify-start">
                        <a href="index.html"
                            ><img
                                class="logo__class"
                                :src="'/shared/images/logo.png'"
                                alt="moonlit"
                                style="max-width: 98px; filter: brightness(200); opacity: 0.95"
                        /></a>
                    </div>
                    <div class="menu text-white hidden lg:block">
                        <div class="navigation d-none d-lg-block">
                            <nav class="navigation__menu" id="main__menu">
                                <ul class="list-unstyled">
                                    <li
                                        class="navigation__menu--item has-child has-arrow before:!text-white"
                                    >
                                        <a href="#" class="navigation__menu--item__link !text-white"
                                            >Home</a
                                        >
                                        <div class="has__mega__menu">
                                            <div
                                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[25px] dark:text-white"
                                            >
                                                <div class="menu__item">
                                                    <a href="index.html">
                                                        <img
                                                            :src="'/client/assets/images/menu/home-1.png'"
                                                            class="h-[250px] object-cover"
                                                            height="250"
                                                            alt=""
                                                        />
                                                        <span>Business Hotel</span>
                                                    </a>
                                                </div>
                                                <div class="menu__item">
                                                    <a href="index-2.html">
                                                        <img
                                                            :src="'/client/assets/images/menu/home-2.png'"
                                                            class="h-[250px] object-cover"
                                                            height="250"
                                                            alt=""
                                                        />
                                                        <span>Business Hotel Two</span>
                                                    </a>
                                                </div>
                                                <div class="menu__item">
                                                    <a href="index-3.html">
                                                        <img
                                                            :src="'/client/assets/images/menu/home-3.png'"
                                                            class="h-[250px] object-cover"
                                                            height="250"
                                                            alt=""
                                                        />
                                                        <span>Luxery Hotel</span>
                                                    </a>
                                                </div>

                                                <div class="menu__item">
                                                    <a href="index-4.html">
                                                        <img
                                                            :src="'/client/assets/images/menu/home-4.png'"
                                                            class="h-[250px] object-cover"
                                                            height="250"
                                                            alt=""
                                                        />
                                                        <span>Apartment Hotel</span>
                                                    </a>
                                                </div>

                                                <div class="menu__item">
                                                    <a href="index-5.html">
                                                        <img
                                                            :src="'/client/assets/images/menu/home-5.png'"
                                                            class="h-[250px] object-cover"
                                                            height="250"
                                                            alt=""
                                                        />
                                                        <span>Mountain Hotel</span>
                                                    </a>
                                                </div>

                                                <div class="menu__item">
                                                    <a href="index-6.html">
                                                        <img
                                                            :src="'/client/assets/images/menu/home-6.png'"
                                                            class="h-[250px] object-cover"
                                                            height="250"
                                                            alt=""
                                                        />
                                                        <span>City Hotel</span>
                                                    </a>
                                                </div>

                                                <div class="menu__item">
                                                    <a href="index-7.html">
                                                        <img
                                                            :src="'/client/assets/images/menu/home-7.png'"
                                                            class="h-[250px] object-cover"
                                                            height="250"
                                                            alt=""
                                                        />
                                                        <span>Beach Hotel</span>
                                                    </a>
                                                </div>
                                                <div class="menu__item">
                                                    <a href="index-dark.html">
                                                        <img
                                                            :src="'/client/assets/images/menu/hotel-dark.webp'"
                                                            class="h-[250px] object-cover"
                                                            height="250"
                                                            alt=""
                                                        />
                                                        <span>Hotel Seaside</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="navigation__menu--item has-child has-arrow before:!text-white"
                                    >
                                        <a href="#" class="navigation__menu--item__link !text-white"
                                            >Rooms</a
                                        >
                                        <ul class="submenu sub__style" role="menu">
                                            <li role="menuitem" class="has-child has-arrow">
                                                <a href="#">Room Style</a>
                                                <ul class="sub__style" role="menu">
                                                    <li role="menuitem">
                                                        <a href="room-1.html">Room One</a>
                                                    </li>
                                                    <li role="menuitem">
                                                        <a href="room-2.html">Room Two</a>
                                                    </li>
                                                    <li role="menuitem">
                                                        <a href="room-3.html">Room Three</a>
                                                    </li>
                                                    <li role="menuitem">
                                                        <a href="room-4.html">Room Three</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li role="menuitem" class="has-child has-arrow">
                                                <a href="#">Room Details</a>
                                                <ul class="sub__style" role="menu">
                                                    <li role="menuitem">
                                                        <a href="room-details-1.html"
                                                            >Room Details 1</a
                                                        >
                                                    </li>
                                                    <li role="menuitem">
                                                        <a href="room-details-2.html"
                                                            >Room Details 2</a
                                                        >
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li
                                        class="navigation__menu--item has-child has-arrow before:!text-white"
                                    >
                                        <a href="#" class="navigation__menu--item__link !text-white"
                                            >Pages</a
                                        >
                                        <ul class="submenu sub__style" role="menu">
                                            <li role="menuitem"><a href="about.html">About</a></li>
                                            <li role="menuitem">
                                                <a href="resturant.html">Restaurant</a>
                                            </li>
                                            <li role="menuitem">
                                                <a href="gallery.html">Gallery</a>
                                            </li>
                                            <li role="menuitem">
                                                <a href="service.html">Service</a>
                                            </li>
                                            <li role="menuitem"><a href="event.html">Event</a></li>
                                            <li role="menuitem">
                                                <a href="activities.html">Activities</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li
                                        class="navigation__menu--item has-child has-arrow before:!text-white"
                                    >
                                        <a href="#" class="navigation__menu--item__link !text-white"
                                            >Blog</a
                                        >
                                        <ul class="submenu sub__style" role="menu">
                                            <li role="menuitem"><a href="blog.html">Blog</a></li>
                                            <li role="menuitem">
                                                <a href="blog-details.html">Blog Details</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="navigation__menu--item">
                                        <a
                                            class="navigation__menu--item__link !text-white"
                                            href="contact.html"
                                            >Contact</a
                                        >
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="main__right flex justify-end gap-[15px] text-white">
                        <button
                            class="theme-btn btn-style sm-btn rounded-[0] border hidden lg:flex !text-white"
                            id="loginModal"
                        >
                            Sign In
                        </button>
                        <button
                            class="theme-btn btn-style sm-btn rounded-[0] border hidden lg:flex !text-white"
                            id="signupModal"
                        >
                            Sign Up
                        </button>
                        <a
                            class="theme-btn btn-style sm-btn fill rounded-[0]"
                            href="room-details-1.html"
                            ><span class="!text-white">Book Now</span></a
                        >
                        <button
                            class="theme-btn btn-style sm-btn fill menu__btn rounded-[0] lg:hidden block"
                            id="menu__btn"
                        >
                            <span
                                ><img :src="'/client/assets/images/icon/menu-icon.svg'" alt=""
                            /></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
