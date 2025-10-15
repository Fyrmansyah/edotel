<script setup>
    import { ref, watch } from "vue";
    import Breadcrumb from "../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import AppLayout from "../../Layouts/Backoffice/AppLayout.vue";
    import { format } from "date-fns";
    import { formatToIdr } from "../../Helpers/shared";
    import { router, usePage } from "@inertiajs/vue3";

    const props = defineProps({ date: String, kpis: Object, chart: Object });
    defineOptions({ layout: AppLayout });

    const page = usePage();
    console.log(page.props.auth);

    const currentDate = ref(props.date || format(new Date(), "yyyy-MM"));
    watch(currentDate, (val) => {
        console.log(val);

        router.get(
            "/admin",
            { date: val },
            { preserveState: true, replace: true }, // agar tidak reload penuh
        );
    });
</script>

<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Dashboard' }]" />
        <div>
            <input
                type="month"
                class="form-control w-[50px]"
                placeholder="input"
                v-model="currentDate"
            />
        </div>
    </PageHeader>
    <div class="flex flex-col h-full">
        <div class="grid grid-cols-3 h-fit mb-3 gap-3">
            <div class="card h-fit">
                <div class="card-body">
                    <h4 class="!font-normal">Total Created Booking</h4>
                    <h1 class="!font-bold mb-0">{{ kpis.total_created_booking }}</h1>
                </div>
            </div>
            <div class="card h-fit">
                <div class="card-body">
                    <h4 class="!font-normal">Total Rejected Booking</h4>
                    <h1 class="!font-bold mb-0">{{ kpis.total_cancelled_booking }}</h1>
                </div>
            </div>
            <div class="card h-fit">
                <div class="card-body">
                    <h4 class="!font-normal">Total Pendapatan</h4>
                    <h1 class="!font-bold mb-0">{{ formatToIdr(kpis.total_revenue) }}</h1>
                </div>
            </div>
        </div>
        <div class="card h-[65%]">
            <div class="card-body">
                <apexchart
                    type="bar"
                    height="100%"
                    :options="{
                        chart: { type: 'bar' },
                        xaxis: {
                            categories: chart.categories,
                        },
                        title: { text: 'Total Booking Chart' },
                        dataLabels: {
                            enabled: false,
                        },
                        tooltip: {
                            y: {
                                formatter: (val) => formatToIdr(val),
                            },
                        },
                        yaxis: {
                            labels: {
                                formatter: (val) => formatToIdr(val),
                            },
                        },
                    }"
                    :series="chart.series"
                ></apexchart>
            </div>
        </div>
    </div>
</template>
