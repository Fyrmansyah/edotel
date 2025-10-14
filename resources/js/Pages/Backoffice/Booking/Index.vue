<script setup>
    import { format } from "date-fns";
    import Button from "../../../Components/Backoffice/Shared/Buttons/Button.vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import Pagination from "../../../Components/Backoffice/Shared/Table/Pagination.vue";
    import Table from "../../../Components/Backoffice/Shared/Table/Table.vue";
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import { onMounted, ref, watch } from "vue";
    import { router, useForm, usePoll } from "@inertiajs/vue3";
    import Modal from "../../../Components/Backoffice/Shared/Modal/Modal.vue";
    import { formatToIdr } from "../../../Helpers/shared";
    import { BOOKING } from "../../../Helpers/constant";

    const TOTAL_BOOKINGS_KEY = "total-bookings";

    defineOptions({ layout: AppLayout });
    const props = defineProps({ bookings: Object, total_bookings: Number });

    usePoll(5000, {
        onSuccess: handleSuccessPolling,
    });

    const isShowAlert = ref(false);
    const audioPlayer = ref(null);
    const form = useForm({
        status: null,
    });
    const selectedBooking = ref(null);
    const filterCheckIn = ref(null);
    const filterCheckOut = ref(null);
    const filterStatus = ref(null);

    watch([filterCheckIn, filterCheckOut, filterStatus], () => {
        let params = {};

        if (filterCheckIn.value) params.check_in = filterCheckIn.value;
        if (filterCheckOut.value) params.check_out = filterCheckOut.value;
        if (filterStatus.value) params.status = filterStatus.value;

        router.get("/admin/bookings", params, {
            preserveState: true,
            replace: true,
        });
    });

    const resetFilter = () => {
        filterCheckIn.value = null;
        filterCheckOut.value = null;
        filterStatus.value = null;
    };

    const getBtnVariant = (status) => {
        switch (status) {
            case BOOKING.status.pending:
            case BOOKING.status.rejected:
                return "success";
            case BOOKING.status.approved:
                return "primary";
            case BOOKING.status.confirmed:
                return "info";
            case BOOKING.status.checked_in:
                return "dark";
            case BOOKING.status.checked_out:
                return "secondary";
        }
    };

    const getBtnText = (status) => {
        switch (status) {
            case BOOKING.status.pending:
            case BOOKING.status.rejected:
                return "Approve";
            case BOOKING.status.approved:
                return "Confirm";
            case BOOKING.status.confirmed:
                return "Checked In";
            case BOOKING.status.checked_in:
            case BOOKING.status.checked_out:
                return "Checked Out";
        }
    };

    const getNextBookingStatus = (status) => {
        switch (status) {
            case BOOKING.status.pending:
            case BOOKING.status.rejected:
                return BOOKING.status.approved;
            case BOOKING.status.approved:
                return BOOKING.status.confirmed;
            case BOOKING.status.confirmed:
                return BOOKING.status.checked_in;
            case BOOKING.status.checked_in:
                return BOOKING.status.checked_out;
        }
    };

    const getModalText = (status) => {
        switch (status) {
            case BOOKING.status.pending:
            case BOOKING.status.rejected:
                return "Apakah anda yakin untuk approve booking ini?";
            case BOOKING.status.approved:
                return "Apakah anda yakin untuk confirm pembayaran booking ini?";
            case BOOKING.status.confirmed:
                return "Apakah anda yakin untuk mengupdate status booking ini menjadi Checked In?";
            case BOOKING.status.checked_in:
                return "Apakah anda yakin untuk mengupdate status booking ini menjadi Checked Out?";
        }
    };

    const getModalTitle = (status) => {
        switch (status) {
            case BOOKING.status.pending:
            case BOOKING.status.rejected:
                return "Approve Booking";
            case BOOKING.status.approved:
                return "Confirm Booking";
            case BOOKING.status.confirmed:
                return "Mark as Checked In";
            case BOOKING.status.checked_in:
                return "Mark as Checked Out";
        }
    };

    function playAudio() {
        audioPlayer.value?.play();
    }

    function dismissAlert() {
        isShowAlert.value = false;
        if (audioPlayer.value) {
            audioPlayer.value.pause();
            audioPlayer.value.currentTime = 0;
        }
    }

    function handleSuccessPolling() {
        if (props.total_bookings > localStorage.getItem(TOTAL_BOOKINGS_KEY)) {
            localStorage.setItem(TOTAL_BOOKINGS_KEY, props.total_bookings);
            playAudio();
            isShowAlert.value = true;
        }
    }

    function handleSubmit(status) {
        console.log(status);
        $("#modal-booking-reject").modal("hide");
        $("#modal-booking-aprove").modal("hide");
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
        <div class="flex items-end gap-3">
            <div>
                <label>Check In</label>
                <input
                    type="date"
                    class="form-control"
                    placeholder="Check in"
                    v-model="filterCheckIn"
                />
            </div>
            <div>
                <label>Check Out</label>
                <input
                    type="date"
                    class="form-control"
                    placeholder="Check Out"
                    v-model="filterCheckOut"
                />
            </div>
            <div>
                <label>Status</label>
                <select class="form-select" v-model="filterStatus">
                    <option class="capitalize" selected :value="null">All</option>
                    <option class="capitalize" :value="BOOKING.status.pending">pending</option>
                    <option class="capitalize" :value="BOOKING.status.approved">approved</option>
                    <option class="capitalize" :value="BOOKING.status.confirmed">confirmed</option>
                    <option class="capitalize" :value="BOOKING.status.checked_in">
                        checked in
                    </option>
                    <option class="capitalize" :value="BOOKING.status.checked_out">
                        checked out
                    </option>
                    <option class="capitalize" :value="BOOKING.status.rejected">rejected</option>
                </select>
            </div>
            <button class="btn btn-secondary whitespace-nowrap" @click="resetFilter">
                Reset Filter
            </button>
        </div>
    </PageHeader>
    <div
        v-if="isShowAlert"
        class="alert alert-danger flex justify-between animate-bounce"
        role="alert"
    >
        Ada Booking Masuk. Tolong Respon Segera !!!
        <button type="button" class="btn-close" aria-label="Close" @click="dismissAlert"></button>
    </div>
    <Table>
        <template #thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Id</th>
                <th>Created At</th>
                <th>Nama Customer</th>
                <th>No Tlp</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Jumlah Penginap</th>
                <th>Jenis Kamar</th>
                <th>Action</th>
            </tr>
        </template>
        <template #tbody>
            <tr v-for="(b, idx) in bookings.data" :key="`booking-record-${b.id}`">
                <td>{{ bookings.from + idx }}</td>
                <td>
                    <span class="badge bg-warning" v-if="b.status === 'pending'">pending</span>
                    <span class="badge bg-success" v-else-if="b.status === BOOKING.status.approved">
                        approved
                    </span>
                    <span class="badge bg-danger" v-else-if="b.status === BOOKING.status.rejected">
                        rejected
                    </span>
                    <span
                        class="badge bg-primary"
                        v-else-if="b.status === BOOKING.status.confirmed"
                    >
                        confirmed
                    </span>
                    <span class="badge bg-info" v-else-if="b.status === BOOKING.status.checked_in">
                        Checked In
                    </span>
                    <span
                        class="badge bg-secondary"
                        v-else-if="b.status === BOOKING.status.checked_out"
                    >
                        Checked Out
                    </span>
                </td>
                <td>{{ b.booking_id }}</td>
                <td class="whitespace-nowrap">{{ format(b.created_at, "d MMM y, hh:mm aaa") }}</td>
                <td>{{ b.name }}</td>
                <td>{{ b.no_tlp }}</td>
                <td class="whitespace-nowrap">{{ format(b.check_in, "d MMM y") }}</td>
                <td class="whitespace-nowrap">{{ format(b.check_out, "d MMM y") }}</td>
                <td>{{ b.jml_orang }} orang</td>
                <td>{{ b.jenis_kamar }}</td>
                <td>
                    <div class="flex gap-2">
                        <Button
                            variant="danger"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-booking-reject"
                            @click="selectedBooking = b"
                        >
                            Reject
                        </Button>
                        <Button
                            :variant="getBtnVariant(b.status)"
                            data-bs-toggle="modal"
                            :disabled="b.status === BOOKING.status.checked_out"
                            data-bs-target="#modal-booking-aprove"
                            @click="selectedBooking = b"
                            class="whitespace-nowrap"
                            >{{ getBtnText(b.status) }}</Button
                        >
                    </div>
                </td>
            </tr>
        </template>
    </Table>
    <Pagination :links="bookings.links" />

    <Modal id="modal-booking-aprove" :title="getModalTitle(selectedBooking?.status)">
        <p>{{ getModalText(selectedBooking?.status) }}</p>
        <Table class="border" v-if="selectedBooking">
            <template #thead>
                <tr>
                    <th>Detail Booking</th>
                </tr>
            </template>
            <template #tbody>
                <tr>
                    <td class="capitalize">booking id</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.booking_id }}</td>
                </tr>
                <tr>
                    <td class="capitalize">nama pemesan</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.name }}</td>
                </tr>
                <tr>
                    <td class="capitalize">no tlp</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.no_tlp }}</td>
                </tr>
                <tr>
                    <td class="capitalize">check-in</td>
                    <td>:</td>
                    <td>{{ format(selectedBooking?.check_in, "d MMM y") }}</td>
                </tr>
                <tr>
                    <td class="capitalize">check-out</td>
                    <td>:</td>
                    <td>{{ format(selectedBooking?.check_out, "d MMM y") }}</td>
                </tr>
                <tr>
                    <td class="capitalize">lama menginap</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.lama_menginap }} malam</td>
                </tr>
                <tr>
                    <td class="capitalize">jumlah orang</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.jml_orang }}</td>
                </tr>
                <tr>
                    <td class="capitalize">jenis kamar</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.jenis_kamar }}</td>
                </tr>
                <tr>
                    <td class="capitalize">harga kamar</td>
                    <td>:</td>
                    <td>{{ formatToIdr(selectedBooking?.harga_kamar) }}</td>
                </tr>
                <tr>
                    <td class="capitalize">extra kasur</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.detail_extra_kasur ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="capitalize">extra makan</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.detail_extra_makan ?? "-" }}</td>
                </tr>
                <tr class="font-bold">
                    <td class="capitalize">Total</td>
                    <td>:</td>
                    <td>{{ formatToIdr(selectedBooking?.total_price) }}</td>
                </tr>
                <tr class="font-bold">
                    <td class="capitalize">dp 50%</td>
                    <td>:</td>
                    <td>{{ formatToIdr(selectedBooking?.total_price / 2) }}</td>
                </tr>
            </template>
        </Table>
        <template #footer>
            <Button
                :variant="getBtnVariant(selectedBooking?.status)"
                @click="() => handleSubmit(getNextBookingStatus(selectedBooking?.status))"
                >{{ getBtnText(selectedBooking?.status) }}</Button
            >
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
                    <td class="capitalize">booking id</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.booking_id }}</td>
                </tr>
                <tr>
                    <td class="capitalize">nama pemesan</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.name }}</td>
                </tr>
                <tr>
                    <td class="capitalize">no tlp</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.no_tlp }}</td>
                </tr>
                <tr>
                    <td class="capitalize">check-in</td>
                    <td>:</td>
                    <td>{{ format(selectedBooking?.check_in, "d MMM y") }}</td>
                </tr>
                <tr>
                    <td class="capitalize">check-out</td>
                    <td>:</td>
                    <td>{{ format(selectedBooking?.check_out, "d MMM y") }}</td>
                </tr>
                <tr>
                    <td class="capitalize">lama menginap</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.lama_menginap }} malam</td>
                </tr>
                <tr>
                    <td class="capitalize">jumlah orang</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.jml_orang }}</td>
                </tr>
                <tr>
                    <td class="capitalize">jenis kamar</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.jenis_kamar }}</td>
                </tr>
                <tr>
                    <td class="capitalize">harga kamar</td>
                    <td>:</td>
                    <td>{{ formatToIdr(selectedBooking?.harga_kamar) }}</td>
                </tr>
                <tr>
                    <td class="capitalize">extra kasur</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.detail_extra_kasur ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="capitalize">extra makan</td>
                    <td>:</td>
                    <td>{{ selectedBooking?.detail_extra_makan ?? "-" }}</td>
                </tr>
                <tr class="font-bold">
                    <td class="capitalize">total price</td>
                    <td>:</td>
                    <td>{{ formatToIdr(selectedBooking?.total_price) }}</td>
                </tr>
                <tr class="font-bold">
                    <td class="capitalize">dp 50%</td>
                    <td>:</td>
                    <td>{{ formatToIdr(selectedBooking?.total_price / 2) }}</td>
                </tr>
            </template>
        </Table>
        <template #footer>
            <Button variant="danger" @click="() => handleSubmit('rejected')">Reject</Button>
        </template>
    </Modal>

    <audio ref="audioPlayer" src="/backoffice/assets/sounds/booking-notification.mp3"></audio>
</template>
