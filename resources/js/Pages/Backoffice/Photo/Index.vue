<script setup>
    import { ref } from "vue";
    import vueFilePond from "vue-filepond";
    import "filepond/dist/filepond.min.css";
    import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
    import FilePondPluginImagePreview from "filepond-plugin-image-preview";
    import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
    import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
    import FilePondPluginImageValidateSize from "filepond-plugin-image-validate-size";

    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import { router } from "@inertiajs/vue3";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import Button from "../../../Components/Backoffice/Shared/Buttons/Button.vue";

    const FilePond = vueFilePond(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
        FilePondPluginImageValidateSize,
    );

    defineOptions({ layout: AppLayout });
    const props = defineProps({ photos: Array });

    const photos = props.photos.map((p) => "/storage/" + p.path);
    const files = ref(photos || []);
    const isSubmitting = ref(false);

    const submit = () => {
        isSubmitting.value = true;
        const photos = files.value.map((f) => f.file);
        router.post(
            "/admin/photos",
            { photos },
            { forceFormData: true, onFinish: () => (isSubmitting.value = false) },
        );
    };
</script>

<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Daftar Foto' }]" />
        <div class="flex gap-2">
            <Button variant="secondary" @click="files = []">Reset</Button>
            <Button variant="primary" :is-loading="isSubmitting" @click="submit">Submit</Button>
        </div>
    </PageHeader>
    <FilePond
        name="photos"
        allow-multiple="true"
        accepted-file-types="image/*"
        :files="files"
        @updatefiles="files = $event"
        label-idle="Drag & Drop gambar dengan aspect ratio 1:1 <span class='filepond--label-action'>Browse</span>"
        max-total-file-size="8MB"
    />
</template>
