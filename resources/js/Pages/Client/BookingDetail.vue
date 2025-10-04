<script setup>
    import { usePoll } from "@inertiajs/vue3";
    import Swal from "sweetalert2";
    import { computed, ref } from "vue";

    const props = defineProps({ booking: Object });

    usePoll(2000);

    const bgColor = computed(() => {
        switch (props.booking.status) {
            case "pending":
                return "bg-[#AB8A62]";
            case "approved":
                return "bg-green-600";
            case "rejected":
                return "bg-red-600";
        }
    });
    const isCopiedBookingId = ref(false);
    const copyBookingId = () => {
        navigator.clipboard.writeText(props.booking.booking_id);
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
            v-if="booking.status === 'pending'"
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
            v-else-if="booking.status === 'approved'"
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
                sesuai nominal melalui qriz dibawah ini, dan harap simpan atau copy booking id
                dibawah ini
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
            v-else-if="booking.status === 'rejected'"
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
        </div>
    </div>
</template>
