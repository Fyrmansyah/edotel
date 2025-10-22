<script setup lang="ts">
    import { Link } from "@inertiajs/vue3";

    defineProps({ admin_phone: String });
</script>

<template>
    <div class="bg-heading">
        <!-- header top -->
        <div class="border-b-[.5px] border-[#65676b33] text-white hidden sm:block">
            <div class="container mx-auto py-[10px]">
                <div class="flex items-center justify-between">
                    <div class="flex gap-[25px]">
                        <a class="flex gap-[10px] items-center text-xs" href="callto:0895417300072">
                            <i class="flaticon-phone-flip relative top-[3px]"></i>
                            {{ admin_phone }}
                        </a>
                        <!-- <a class="flex gap-[10px] items-center text-xs" href="mailto:#">
                            <i class="flaticon-envelope relative top-[3px]"></i>
                            test@gmail.com
                        </a> -->
                    </div>
                    <div>
                        <a class="flex gap-[10px] items-center text-xs" href="#">
                            <i class="flaticon-marker relative top-[2px]"></i>
                            Jl. Smea No.4, Wonokromo, Kec. Wonokromo, Surabaya, Jawa Timur
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- header menu -->
        <div class="header transition header__function is__home__3">
            <div class="container">
                <div
                    class="flex justify-between lg:!grid lg:grid-cols-3 lg:!justify-center items-center py-4 lg:py-0"
                >
                    <div class="menu text-white hidden lg:block">
                        <div class="navigation d-none d-lg-block">
                            <nav class="navigation__menu" id="main__menu">
                                <ul class="list-unstyled">
                                    <li class="navigation__menu--item has-child before:!text-white">
                                        <a
                                            href="#banner"
                                            class="navigation__menu--item__link !text-white"
                                            >Beranda</a
                                        >
                                    </li>
                                    <li
                                        class="navigation__menu--item has-child before:!text-white whitespace-nowrap"
                                    >
                                        <a
                                            href="#about-us"
                                            class="navigation__menu--item__link !text-white"
                                        >
                                            Tentang Kami
                                        </a>
                                    </li>

                                    <li class="navigation__menu--item has-child before:!text-white">
                                        <a
                                            href="#pricings"
                                            class="navigation__menu--item__link !text-white"
                                            >Harga
                                        </a>
                                    </li>
                                    <li class="navigation__menu--item has-child before:!text-white">
                                        <a
                                            href="#facilities"
                                            class="navigation__menu--item__link !text-white"
                                            >Fasilitas
                                        </a>
                                    </li>

                                    <li class="navigation__menu--item">
                                        <a
                                            class="navigation__menu--item__link !text-white"
                                            href="#contact"
                                            >Kontak</a
                                        >
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="logo flex items-center justify-center">
                        <a href="index.html"
                            ><img
                                class="logo__class"
                                :src="'/shared/images/logo.png'"
                                alt="moonlit"
                                style="max-width: 98px; filter: brightness(200); opacity: 0.95"
                        /></a>
                    </div>

                    <div class="main__right flex justify-end gap-[15px] text-white">
                        <!-- <button
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
                        </button> -->
                        <Link
                            class="theme-btn btn-style sm-btn outline rounded-[0]"
                            href="/booking/find"
                        >
                            <span class="!text-white">Lihat Booking</span>
                        </Link>
                        <Link class="theme-btn btn-style sm-btn fill rounded-[0]" href="/booking">
                            <span class="!text-white">Booking</span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
