<script setup>
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import Pagination from "../../../Components/Backoffice/Shared/Table/Pagination.vue";
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";

    defineOptions({ layout: AppLayout });
    const props = defineProps({ reviews: Object });
    console.log(props);
</script>

<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Review' }, { label: 'Listing' }]" />
    </PageHeader>
    <div v-if="reviews.data.length > 0" class="columns-1 sm:columns-2 lg:columns-3 gap-3">
        <div class="card h-fit break-inside-avoid mb-3" v-for="r in reviews.data">
            <div class="card-header">
                <h3>{{ r.name }}</h3>
                <div class="flex gap-1">
                    <i
                        class="bx text-yellow-500"
                        :class="r.stars >= s ? 'bxs-star' : 'bx-star'"
                        v-for="s in [1, 2, 3, 4, 5]"
                    ></i>
                </div>
            </div>
            <div class="card-body">
                {{ r.message }}
            </div>
        </div>
    </div>
    <div v-else>
        <h1>Masi belum ada revie</h1>
    </div>
    <Pagination :links="reviews.links" />
</template>
