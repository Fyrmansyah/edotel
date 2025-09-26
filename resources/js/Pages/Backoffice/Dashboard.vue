<script setup lang="ts">
    import Breadcrumb from "../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import AppLayout from "../../Layouts/Backoffice/AppLayout.vue";

    defineOptions({ layout: AppLayout });
</script>

<template>
    <PageHeader>
        <Breadcrumb :paths="[{label: 'Dashboard'}]"/>
    </PageHeader>
</template>
