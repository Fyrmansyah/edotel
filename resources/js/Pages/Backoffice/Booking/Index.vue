<script setup>
    import { format } from "date-fns";
    import Button from "../../../Components/Backoffice/Shared/Buttons/Button.vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import Pagination from "../../../Components/Backoffice/Shared/Table/Pagination.vue";
    import Table from "../../../Components/Backoffice/Shared/Table/Table.vue";
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import { onMounted, ref, watch } from "vue";
    import { useForm, usePoll } from "@inertiajs/vue3";
    import Modal from "../../../Components/Backoffice/Shared/Modal/Modal.vue";

    const TOTAL_BOOKINGS_KEY = "total-bookings";

    defineOptions({ layout: AppLayout });
    const props = defineProps({ bookings: Object, total_bookings: Number });

    usePoll(5000, {
        onSuccess: handleSuccessPolling,
    });

    const audioPlayer = ref(null);
    const form = useForm({
        status: null,
    });
    const selectedBooking = ref(null);

    function playAudio() {
        audioPlayer.value.play();
    }

    function handleSuccessPolling() {
        if (props.total_bookings > localStorage.getItem(TOTAL_BOOKINGS_KEY)) {
            localStorage.setItem(TOTAL_BOOKINGS_KEY, props.total_bookings);
            playAudio();
        }
    }

    function handleSubmit(status) {
        form.status = status;
        form.post(`/admin/bookings/update/${selectedBooking.value.id}`);
    }

    onMounted(() => {
        localStorage.setItem(TOTAL_BOOKINGS_KEY, props.total_bookings);
    });
</script>

<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Booking' }, { label: 'Listing' }]" />
    </PageHeader>
    <Table>
        <template #thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Id</th>
                <th>Nama Customer</th>
                <th>No Tlp</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>tamu</th>
                <th>Action</th>
            </tr>
        </template>
        <template #tbody>
            <tr v-for="(b, idx) in bookings.data" :key="`booking-record-${b.id}`">
                <td>{{ bookings.from + idx }}</td>
                <td>
                    <span class="badge bg-warning" v-if="b.status === 'pending'">pending</span>
                    <span class="badge bg-success" v-else-if="b.status === 'approved'"
                        >approved</span
                    >
                    <span class="badge bg-danger" v-else-if="b.status === 'rejected'"
                        >rejected</span
                    >
                </td>
                <td>{{ b.booking_id }}</td>
                <td>{{ b.name }}</td>
                <td>{{ b.no_tlp }}</td>
                <td>{{ format(b.check_in, "d MMM y, hh:mm aaa") }}</td>
                <td>{{ format(b.check_out, "d MMM y, hh:mm aaa") }}</td>
                <td>{{ b.jml_orang }} orang</td>

                <td>
                    <div class="flex gap-2">
                        <Button
                            variant="danger"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-booking-reject"
                            @click="() => (selectedBooking = b)"
                        >
                            Reject
                        </Button>
                        <Button
                            variant="success"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-booking-aprove"
                            @click="() => (selectedBooking = b)"
                            >Approve</Button
                        >
                    </div>
                </td>
            </tr>
        </template>
    </Table>
    <Pagination :links="bookings.links" />

    <Modal id="modal-booking-aprove" title="Approve Booking">
        <p>Apakah anda yakin untuk approve booking ini?</p>
        <Table class="border" v-if="selectedBooking">
            <template #thead>
                <tr>
                    <th>Detail Booking</th>
                </tr>
            </template>
            <template #tbody>
                <tr>
                    <td>booking id</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.booking_id }}</td>
                </tr>
                <tr>
                    <td>nama pemesan</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.name }}</td>
                </tr>
                <tr>
                    <td>no tlp</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.no_tlp }}</td>
                </tr>
                <tr>
                    <td>check-in</td>
                    <td>:</td>
                    <td>{{ format(selectedBooking?.check_in, "d MMM y") }}</td>
                </tr>
                <tr>
                    <td>check-out</td>
                    <td>:</td>
                    <td>{{ format(selectedBooking?.check_out, "d MMM y") }}</td>
                </tr>
            </template>
        </Table>
        <template #footer>
            <Button variant="success" @click="() => handleSubmit('approved')">Approve</Button>
        </template>
    </Modal>
    <Modal id="modal-booking-reject" title="Reject Booking">
        <p>Apakah anda yakin untuk reject booking ini?</p>
        <Table class="border" v-if="selectedBooking">
            <template #thead>
                <tr>
                    <th>Detail Booking</th>
                </tr>
            </template>
            <template #tbody>
                <tr>
                    <td>booking id</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.booking_id }}</td>
                </tr>
                <tr>
                    <td>nama pemesan</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.name }}</td>
                </tr>
                <tr>
                    <td>no tlp</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.no_tlp }}</td>
                </tr>
                <tr>
                    <td>check-in</td>
                    <td>:</td>
                    <td>{{ format(selectedBooking?.check_in, "d MMM y") }}</td>
                </tr>
                <tr>
                    <td>check-out</td>
                    <td>:</td>
                    <td>{{ format(selectedBooking?.check_out, "d MMM y") }}</td>
                </tr>
            </template>
        </Table>
        <template #footer>
            <Button variant="danger" @click="() => handleSubmit('rejected')">Reject</Button>
        </template>
    </Modal>

    <audio ref="audioPlayer" src="/backoffice/assets/sounds/booking-notification.mp3"></audio>
</template>
