<script setup>
    import { ref } from "vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import { useForm } from "@inertiajs/vue3";

    defineOptions({ layout: AppLayout });

    const previewUrl = ref("/backoffice/assets/sounds/booking-notification.mp3");

    const form = useForm({
        sound: null,
    });

    const handleFileChange = (e) => {
        const file = e.target.files[0];
        if (file) {
            form.sound = file;
            previewUrl.value = URL.createObjectURL(file);
        }
    };

    const handleSubmit = () => {
        form.post("/admin/settings", {
            forceFormData: true,
        });
    };
</script>

<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Pengaturan' }]" />
    </PageHeader>
    <div class="card">
        <div class="card-body">
            <input type="file" accept=".mp3" @change="handleFileChange" class="form-control" />
            <div class="mt-3">
                <small>Preview</small>
                <audio :src="previewUrl" controls></audio>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" @click="handleSubmit">Save</button>
        </div>
    </div>
</template>
