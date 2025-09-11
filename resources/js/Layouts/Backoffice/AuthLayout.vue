<template>
    <Head>
        <link rel="stylesheet" href="/backoffice/assets/vendor/css/pages/page-auth.css" />
    </Head>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { Head } from "@inertiajs/vue3";
</script>
