<script setup>
    import { useForm } from "@inertiajs/vue3";
    import Button from "../../../Components/Backoffice/Shared/Buttons/Button.vue";
    import Input from "../../../Components/Backoffice/Shared/Forms/Input.vue";
    import Modal from "../../../Components/Backoffice/Shared/Modal/Modal.vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import Table from "../../../Components/Backoffice/Shared/Table/Table.vue";
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import { ref } from "vue";
    import Card from "../../../Components/Backoffice/Shared/Card/Card.vue";

    defineOptions({ layout: AppLayout });
    defineProps({ pricings: Array });

    const form = useForm({
        id: null,
        value: null,
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
    <div class="grid grid-cols-3 gap-4">
        <Card v-for="p in pricings">
            <div>
                <h3>{{ p.name }}</h3>
                <h1>Rp{{ p.value }}</h1>
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
    </div>
    <Modal id="modal-pricing-edit" title="Edit Harga">
        <Input label="Harga" v-model="form.value" :err-message="form.errors.value" />
        <template #footer>
            <Button variant="primary" @click="handleUpdate">Update</Button>
        </template>
    </Modal>
</template>
