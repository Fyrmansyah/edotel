<script setup>
    import { router, useForm } from "@inertiajs/vue3";
    import Button from "../../../Components/Backoffice/Shared/Buttons/Button.vue";
    import Modal from "../../../Components/Backoffice/Shared/Modal/Modal.vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import { ref } from "vue";

    defineOptions({ layout: AppLayout });
    defineProps({ kamars: Array });

    const isSubmitting = ref(false);
    const form = useForm({
        nomor: null,
        jenis: null,
    });
    const deletedKamar = ref(null);

    function handleDelete(val) {
        deletedKamar.value = val;
        $("#modal-delete-kamar").modal("show");
    }

    function submitDelete() {
        router.delete("/admin/kamar/" + deletedKamar.value.id, {
            onSuccess: () => {
                $("#modal-delete-kamar").modal("hide");
            },
        });
        deletedAccount.value = null;
    }

    function handleSubmit() {
        isSubmitting.value = true;
        form.post("/admin/kamar", {
            onFinish: (isSubmitting.value = false),
            onSuccess: () => {
                $("#modal-form-kamar").modal("hide");
                form.reset();
            },
        });
    }
</script>
<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Daftar Kamar' }]" />
        <Button variant="primary" data-bs-toggle="modal" data-bs-target="#modal-form-kamar"
            >Tambah Kamar</Button
        >
    </PageHeader>
    <div class="grid grid-cols-3 gap-3">
        <div class="card" v-for="k in kamars">
            <div class="card-body flex justify-between items-center">
                <div class="flex gap-3 flex-col">
                    <h3 class="badge bg-primary mb-0 w-fit">{{ k.jenis }}</h3>
                    <h3 class="mb-0">Nomor: {{ k.nomor }}</h3>
                </div>
                <div class="flex flex-col gap-2">
                    <button><i class="bx bx-edit text-yellow-500"></i></button>
                    <button @click="handleDelete(k)">
                        <i class="bx bx-trash text-red-500"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <Modal id="modal-form-kamar" title="Tambah Kamar">
        <div class="mb-3">
            <label class="form-label">Nomor Kamar</label>
            <input
                type="text"
                class="form-control"
                v-model="form.nomor"
                :class="{ 'is-invalid': form.errors?.nomor }"
            />
            <div v-if="form.errors?.nomor" class="invalid-feedback">
                {{ form.errors?.nomor }}
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Kamar</label>
            <select
                class="form-select"
                aria-label="Default select example"
                v-model="form.jenis"
                :class="{ 'is-invalid': form.errors?.jenis }"
            >
                <option value="sedang">Sedang</option>
                <option value="besar">Besar</option>
            </select>
            <div v-if="form.errors?.jenis" class="invalid-feedback">
                {{ form.errors?.jenis }}
            </div>
        </div>
        <template #footer>
            <Button variant="primary" @click="handleSubmit" :is-loading="isSubmitting"
                >Simpan</Button
            >
        </template>
    </Modal>
    <Modal id="modal-delete-kamar" title="Hapus Kamar">
        <p>apa anda yakin untuk menghapus kamar ini?</p>

        <template #footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" @click="submitDelete" class="btn btn-danger">Hapus</button>
        </template>
    </Modal>
</template>
