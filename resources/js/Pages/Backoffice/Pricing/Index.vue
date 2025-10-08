<script setup>
    import vueFilePond from "vue-filepond";
    import "filepond/dist/filepond.min.css";
    import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
    import FilePondPluginImagePreview from "filepond-plugin-image-preview";
    import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
    import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
    import FilePondPluginImageValidateSize from "filepond-plugin-image-validate-size";
    import { useForm } from "@inertiajs/vue3";
    import Button from "../../../Components/Backoffice/Shared/Buttons/Button.vue";
    import Input from "../../../Components/Backoffice/Shared/Forms/Input.vue";
    import Modal from "../../../Components/Backoffice/Shared/Modal/Modal.vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import Card from "../../../Components/Backoffice/Shared/Card/Card.vue";
    import { useQris } from "../../../Composeables/Pricing/useQris";
    import { onMounted } from "vue";
    import { formatToIdr } from "../../../Helpers/shared";

    defineOptions({ layout: AppLayout });
    const props = defineProps({ pricings: Array, qris: Object });

    const FilePond = vueFilePond(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
        FilePondPluginImageValidateSize,
    );

    const cqris = useQris();

    const form = useForm({
        id: null,
        value: null,
    });

    onMounted(() => {
        if (props.qris?.image) {
            cqris.files.value = "/storage/" + props.qris.image;
        }
    });

    const openEdit = (pricing) => {
        form.reset();
        form.id = pricing.id;
        form.value = pricing.value;
    };

    const handleUpdate = () => {
        form.post(`/admin/pricings/${form.id}`);
    };
</script>

<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Pricing' }, { label: 'listing' }]" />
    </PageHeader>
    <div class="grid grid-cols-4 gap-4">
        <Card v-for="p in pricings">
            <div>
                <h3>{{ p.name }}</h3>
                <h1>{{ formatToIdr(p.value) }}</h1>
            </div>
            <Button
                @click="() => openEdit(p)"
                variant="warning"
                data-bs-toggle="modal"
                data-bs-target="#modal-pricing-edit"
                class="w-full"
            >
                Edit
            </Button>
        </Card>
        <Card>
            <h3>Photo QRIS</h3>
            <FilePond
                accepted-file-types="image/*"
                :files="cqris.files.value"
                @updatefiles="cqris.files.value = $event"
                label-idle="Drag & Drop gambar dengan aspect ratio 1:1 <span class='filepond--label-action'>Browse</span>"
                max-total-file-size="8MB"
            />
            <Button
                variant="warning"
                @click="cqris.update"
                class="w-full"
                :is-loading="cqris.isSubmitting.value"
            >
                Update
            </Button>
        </Card>
    </div>
    <Modal id="modal-pricing-edit" title="Edit Harga">
        <Input label="Harga" v-model="form.value" :err-message="form.errors.value" />
        <template #footer>
            <Button variant="primary" @click="handleUpdate">Update</Button>
        </template>
    </Modal>
</template>
