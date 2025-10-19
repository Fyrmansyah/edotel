<script setup>
    import { Link, usePage } from "@inertiajs/vue3";
    import { useActiveLink } from "../../Composeables/Shared/useActiveLink";
    import { useAuth } from "../../Composeables/Backoffice/useAuth";

    const { isActive, isDashboardActive } = useActiveLink();
    const auth = useAuth();
</script>

<template>
    <!-- Menu -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <div class="app-brand-link">
                <span class="app-brand-logo demo">
                    <img :src="'/shared/images/logo.png'" alt="" class="w-[90px]" />
                </span>
            </div>

            <a
                href="javascript:void(0);"
                class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"
            >
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item" :class="isDashboardActive()">
                <Link href="/admin" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </Link>
            </li>

            <li
                class="menu-item"
                :class="[isActive('/admin/accounts'), auth.hideIfNotSuperadmin()]"
            >
                <Link href="/admin/accounts" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Tables">Akun</div>
                </Link>
            </li>
            <li class="menu-item" :class="[isActive('/admin/reviews'), auth.hideIfNotSuperadmin()]">
                <Link href="/admin/reviews" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-message-square-dots"></i>
                    <div data-i18n="Tables">Ulasan</div>
                </Link>
            </li>
            <li
                class="menu-item"
                :class="[isActive('/admin/settings'), auth.hideIfNotSuperadmin()]"
            >
                <Link href="/admin/settings" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div data-i18n="Tables">Pengaturan</div>
                </Link>
            </li>
            <!-- Components -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Manajemen</span>
            </li>
            <!-- Cards -->
            <li
                class="menu-item"
                :class="[isActive('/admin/pricings'), auth.hideIfNotSuperadmin()]"
            >
                <Link href="/admin/pricings" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-money"></i>
                    <div data-i18n="Basic">Harga</div>
                </Link>
            </li>
            <li class="menu-item" :class="isActive('/admin/bookings')">
                <Link href="/admin/bookings" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-bed"></i>
                    <div data-i18n="Basic">Booking</div>
                </Link>
            </li>
            <li class="menu-item" :class="[isActive('/admin/photos'), auth.hideIfNotSuperadmin()]">
                <Link href="/admin/photos" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-camera"></i>
                    <div data-i18n="Tables">Foto</div>
                </Link>
            </li>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Account</span>
            </li>
            <li class="menu-item">
                <Link href="/admin/logout" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-log-out"></i>
                    <div data-i18n="Tables">Log Out</div>
                </Link>
            </li>
        </ul>
    </aside>
    <!-- / Menu -->
</template>
