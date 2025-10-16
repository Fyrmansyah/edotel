<script setup>
    import { ref } from "vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import Pagination from "../../../Components/Backoffice/Shared/Table/Pagination.vue";
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import Modal from "../../../Components/Backoffice/Shared/Modal/Modal.vue";
    import { router } from "@inertiajs/vue3";
    import { format } from "date-fns";

    defineOptions({ layout: AppLayout });
    const props = defineProps({ reviews: Object });

    const selectedReview = ref(null);

    const handleDelete = () => {
        $("#modal-delete-review").modal("hide");
        router.delete("/admin/reviews/" + selectedReview?.value.id);
    };
</script>

<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Daftar Ulasan' }]" />
        <Pagination :links="reviews.links" v-if="reviews.data.length > 0" />
    </PageHeader>
    <div v-if="reviews.data.length > 0">
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-3">
            <div class="card h-fit break-inside-avoid mb-3" v-for="r in reviews.data">
                <div class="card-header">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="mb-0">{{ r.name }}</h4>
                        <button
                            @click="selectedReview = r"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-delete-review"
                        >
                            <i class="bx bx-trash text-red-500"></i>
                        </button>
                    </div>
                    <div class="flex gap-1">
                        <i
                            class="bx text-yellow-500"
                            :class="r.stars >= s ? 'bxs-star' : 'bx-star'"
                            v-for="s in [1, 2, 3, 4, 5]"
                        ></i>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{ r.message }}</p>
                    <p class="mb-0">{{ format(r.created_at, "d MMM y, hh:mm aaa") }}</p>
                </div>
            </div>
        </div>
        <Modal id="modal-delete-review" title="Hapus Review">
            <p>apa anda yakin untuk menghapus review ini?</p>
            <div class="card h-fit break-inside-avoid mb-3">
                <div class="card-header">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="mb-0">{{ selectedReview?.name }}</h4>
                    </div>
                    <div class="flex gap-1">
                        <i
                            class="bx text-yellow-500"
                            :class="selectedReview?.stars >= s ? 'bxs-star' : 'bx-star'"
                            v-for="s in [1, 2, 3, 4, 5]"
                        ></i>
                    </div>
                </div>
                <div class="card-body">
                    {{ selectedReview?.message }}
                </div>
            </div>
            <template #footer>
                <button @click="handleDelete" class="btn btn-danger">Hapus</button>
            </template>
        </Modal>
    </div>
    <div v-else class="flex justify-center items-center h-full">
        <h1 class="animate-bounce">Belum ada ulasan</h1>
    </div>
</template>
