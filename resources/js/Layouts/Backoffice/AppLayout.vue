<script setup>
    import { watch } from "vue";
    import NavHeader from "./NavHeader.vue";
    import SidebarMenu from "./SidebarMenu.vue";
    import { usePage } from "@inertiajs/vue3";
    import { Alert } from "../../Helpers/sweet-alert";

    const page = usePage();

    watch(
        () => page.props.flash,
        () => {
            console.log(page.props.flash);

            if (page.props.flash?.success) {
                Alert.success(page.props.flash?.success);
            }
            if (page.props.flash?.error) {
                Alert.error(page.props.flash?.error);
            }
        },
    );
</script>

<template>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <SidebarMenu />

            <!-- Layout container -->
            <div class="layout-page">
                <NavHeader />

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <slot></slot>
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
</template>
