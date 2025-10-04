<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="bg-heading">
        <!-- header top -->
        <div class="border-b-[.5px] border-[#65676b33] text-white hidden sm:block">
            <div class="container mx-auto py-[10px]">
                <div class="flex items-center justify-between">
                    <div class="flex gap-[25px]">
                        <a class="flex gap-[10px] items-center text-xs" href="callto:#">
                            <i class="flaticon-phone-flip relative top-[3px]"></i>
                            +62 895-4173-00072
                        </a>
                        <a class="flex gap-[10px] items-center text-xs" href="mailto:#">
                            <i class="flaticon-envelope relative top-[3px]"></i>
                            test@gmail.com
                        </a>
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
                    class="grid grid-cols-2 lg:grid-cols-3 justify-center items-center py-4 lg:py-0"
                >
                    <div class="menu text-white hidden lg:block">
                        <div class="navigation d-none d-lg-block">
                            <nav class="navigation__menu" id="main__menu">
                                <ul class="list-unstyled">
                                    <li class="navigation__menu--item has-child before:!text-white">
                                        <a href="#" class="navigation__menu--item__link !text-white"
                                            >Home</a
                                        >
                                    </li>

                                    <li class="navigation__menu--item has-child before:!text-white">
                                        <a href="#" class="navigation__menu--item__link !text-white"
                                            >Rooms
                                        </a>
                                    </li>
                                    <li class="navigation__menu--item has-child before:!text-white">
                                        <a href="#" class="navigation__menu--item__link !text-white"
                                            >Facilities
                                        </a>
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
                            class="theme-btn btn-style sm-btn fill rounded-[0]"
                            href="/booking"
                        >
                            <span class="!text-white">Book Now</span>
                        </Link>
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
