<script setup>
    import { usePoll } from "@inertiajs/vue3";
    import Swal from "sweetalert2";
    import { computed, ref } from "vue";
    import { formatToIdr } from "../../Helpers/shared";
    import { BOOKING } from "../../Helpers/constant";
    import { format } from "date-fns";

    const props = defineProps({ booking: Object, qris: Object, admin_phone: String });

    usePoll(2000);

    const bgColor = computed(() => {
        switch (props.booking.status) {
            case "pending":
                return "bg-[#AB8A62]";
            case "approved":
                return "bg-green-600";
            case "rejected":
                return "bg-red-600";
            default:
                return "bg-violet-600";
        }
    });
    const isCopiedBookingId = ref(false);
    const copyBookingId = () => {
        navigator.clipboard.writeText(props.booking?.booking_id);
        isCopiedBookingId.value = true;
        Swal.fire({
            icon: "success",
            toast: true,
            text: "Sukses copy booking id",
            position: "top-right",
            showConfirmButton: false,
            timer: 1500,
        });
    };
</script>

<template>
    <div class="px-5 flex flex-col py-10 w-screen min-h-screen" :class="bgColor">
        <div
            v-if="booking.status === BOOKING.status.pending"
            class="flex flex-col items-center justify-center flex-1"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-24 animate-spin text-white"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"
                />
            </svg>
            <h1 class="text-white !mt-12 !mb-5">Proses</h1>
            <p class="text-white text-center max-w-2xl">
                Booking anda sedang diproses oleh admin kami, harap tunggu beberapa menit. Harap
                simpan atau copy booking id dibawah ini agar bisa digunakan lagi jika aplikasi
                tertutup
            </p>

            <button @click="copyBookingId" class="flex gap-2 items-center !mt-5">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5 text-white"
                    v-if="!isCopiedBookingId"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"
                    />
                </svg>

                <svg
                    v-else
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5 text-white"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                </svg>

                <p class="text-white !text-xl font-bold">Booking ID: {{ booking.booking_id }}</p>
            </button>
        </div>
        <div
            v-else-if="booking.status === BOOKING.status.approved"
            class="flex flex-col items-center justify-center flex-1"
        >
            <div class="w-fit relative flex items-center justify-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-24 text-white z-10"
                >
                    <path
                        fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                        clip-rule="evenodd"
                    />
                </svg>
                <div
                    class="bg-green-200 rounded-full animate-ping w-[70%] h-[70%] absolute z-0"
                ></div>
            </div>

            <h1 class="text-white !mt-12 !mb-5">Sukses</h1>
            <p class="text-white text-center max-w-2xl">
                Booking anda telah di approved oleh admin kami, harap segera melakukan pembayaran
                sesuai nominal melalui qris dibawah ini dengan batas pembayaran adalah 3 jam setelah
                booking anda di approved atau booking akan hangus. harap simpan atau copy booking id
                dibawah ini
            </p>
            <button @click="copyBookingId" class="flex gap-2 items-center !mt-5 !mb-8">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5 text-white"
                    v-if="!isCopiedBookingId"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"
                    />
                </svg>

                <svg
                    v-else
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5 text-white"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                </svg>

                <p class="text-white !text-xl font-bold">Booking ID: {{ booking.booking_id }}</p>
            </button>
            <div class="bg-white flex flex-col gap-2 items-center !shadow-md max-w-md">
                <img :src="'/storage/' + qris?.image" class="w-full" />
                <div>
                    <p class="text-center text-black">Nominal yang harus dibayarkan</p>
                </div>
                <h2 class="font-bold text-black">
                    {{ formatToIdr(booking.total_price / 2) }}
                </h2>
                <p class="text-center max-w-[90%]">
                    Harap kirim bukti pembayaran melalui whatsapp ke nomor berikut: <br />
                </p>
                <b class="bg-green-100 text-black px-2 py-1">{{ admin_phone }}</b>
                <p class="text-center px-4 !text-[12px] leading-snug text-gray-500 !mb-5">
                    <span class="text-red-500">*</span> nominal diatas merupakan dp 50% dari total
                    biaya :
                    {{ formatToIdr(booking.total_price) }}
                </p>
            </div>
        </div>
        <div
            v-else-if="booking.status === BOOKING.status.rejected"
            class="flex flex-col items-center justify-center flex-1"
        >
            <div class="w-fit relative flex items-center justify-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-24 text-white z-10"
                >
                    <path
                        fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                        clip-rule="evenodd"
                    />
                </svg>

                <div
                    class="bg-red-200 rounded-full animate-ping w-[70%] h-[70%] absolute z-0"
                ></div>
            </div>

            <h1 class="text-white !mt-12 !mb-5">Ditolak</h1>
            <p class="text-white text-center max-w-2xl">
                Maaf booking anda kami tidak dapat kami approved
            </p>
            <p class="text-white text-center max-w-2xl"><b>alasan:</b> {{ booking?.admin_note }}</p>
        </div>
        <div v-else class="flex flex-col items-center justify-center flex-1">
            <div class="w-fit relative flex items-center justify-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-24 text-white z-10"
                >
                    <path
                        fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                        clip-rule="evenodd"
                    />
                </svg>
                <div
                    class="bg-green-200 rounded-full animate-ping w-[70%] h-[70%] absolute z-0"
                ></div>
            </div>

            <h1 class="text-white !mt-12 !mb-5 text-center !text-3xl lg:!text-7xl">
                Pembayaran Berhasil
            </h1>
            <p class="text-white text-center max-w-2xl">
                Admin kami telah mengkonfirmasi pembayaran anda. Terima Kasih
            </p>
            <button @click="copyBookingId" class="flex gap-2 items-center !mt-5 !mb-8">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5 text-white"
                    v-if="!isCopiedBookingId"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"
                    />
                </svg>

                <svg
                    v-else
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5 text-white"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                </svg>

                <p class="text-white !text-xl font-bold">Booking ID: {{ booking.booking_id }}</p>
            </button>
            <div
                class="bg-white flex flex-col gap-2 items-center !shadow-md max-w-md px-5 py-5 w-full"
            >
                <h6 class="font-bold text-black mb-4">Detail Booking Anda</h6>
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">booking id</td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ booking?.booking_id }}
                            </td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">
                                nama pemesan
                            </td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">{{ booking?.name }}</td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">no tlp</td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">{{ booking?.no_tlp }}</td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">check-in</td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ format(booking?.check_in, "d MMM y") }}
                            </td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">check-out</td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ format(booking?.check_out, "d MMM y") }}
                            </td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">
                                lama menginap
                            </td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ booking?.lama_menginap }} malam
                            </td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">
                                jumlah orang
                            </td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ booking?.jml_orang }}
                            </td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">
                                jenis kamar
                            </td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ booking?.jenis_kamar }}
                            </td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">
                                harga kamar
                            </td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ formatToIdr(booking?.harga_kamar) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">
                                extra kasur
                            </td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ booking?.detail_extra_kasur ?? "-" }}
                            </td>
                        </tr>
                        <tr>
                            <td class="capitalize !border-b !border-b-gray-300 py-3">
                                extra makan
                            </td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ booking?.detail_extra_makan ?? "-" }}
                            </td>
                        </tr>
                        <tr class="font-bold">
                            <td class="capitalize !border-b !border-b-gray-300 py-3">Total</td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ formatToIdr(booking?.total_price) }}
                            </td>
                        </tr>
                        <tr class="font-bold">
                            <td class="capitalize !border-b !border-b-gray-300 py-3">dp 50%</td>
                            <td class="!border-b !border-b-gray-300 py-3">:</td>
                            <td class="!border-b !border-b-gray-300 py-3">
                                {{ formatToIdr(booking?.total_price / 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
