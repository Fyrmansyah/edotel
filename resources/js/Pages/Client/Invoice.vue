<script setup>
    import { format } from "date-fns";
    import { formatToIdr } from "../../Helpers/shared";
    import { ref, watch } from "vue";
    import { useForm, usePage } from "@inertiajs/vue3";
    import { Alert } from "../../Helpers/sweet-alert";
    import Button from "../../Components/Client/Shared/Button.vue";

    const props = defineProps({ booking: Object });
    const page = usePage();
    const isSubmitting = ref(false);

    watch(
        () => page.props.flash,
        () => {
            console.log(page.props.flash);

            if (page.props.flash?.success) {
                Alert.success(page.props.flash?.success);
            }
            if (page.props.flash?.error) {
                Alert.error(page.props.flash?.error);
            }
        },
    );

    const checkStars = (star) => {
        return form.stars >= star ? "currentColor" : "none";
    };

    const handleSubmit = () => {
        isSubmitting.value = true;
        form.post("/review", {
            onFinish: () => (isSubmitting.value = false),
            preserveScroll: true,
        });
    };

    const form = useForm({
        stars: 1,
        message: "",
        name: "",
    });
</script>

<template>
    <div class="flex flex-col items-center py-[30px] px-[20px] gap-5 bg-[#000834]">
        <div class="bg-white flex flex-col gap-2 items-center !shadow-md max-w-md px-5 py-5 w-full">
            <img :src="'/shared/images/logo.png'" alt="logo" class="w-[150px] mb-[30px]" />
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
                        <td class="capitalize !border-b !border-b-gray-300 py-3">customer</td>
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
                        <td class="capitalize !border-b !border-b-gray-300 py-3">lama menginap</td>
                        <td class="!border-b !border-b-gray-300 py-3">:</td>
                        <td class="!border-b !border-b-gray-300 py-3">
                            {{ booking?.lama_menginap }} malam
                        </td>
                    </tr>
                    <tr>
                        <td class="capitalize !border-b !border-b-gray-300 py-3">jumlah orang</td>
                        <td class="!border-b !border-b-gray-300 py-3">:</td>
                        <td class="!border-b !border-b-gray-300 py-3">
                            {{ booking?.jml_orang }}
                        </td>
                    </tr>
                    <tr>
                        <td class="capitalize !border-b !border-b-gray-300 py-3">jenis kamar</td>
                        <td class="!border-b !border-b-gray-300 py-3">:</td>
                        <td class="!border-b !border-b-gray-300 py-3">
                            {{ booking?.jenis_kamar }}
                        </td>
                    </tr>
                    <tr>
                        <td class="capitalize !border-b !border-b-gray-300 py-3">harga kamar</td>
                        <td class="!border-b !border-b-gray-300 py-3">:</td>
                        <td class="!border-b !border-b-gray-300 py-3">
                            {{ formatToIdr(booking?.harga_kamar) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="capitalize !border-b !border-b-gray-300 py-3">extra kasur</td>
                        <td class="!border-b !border-b-gray-300 py-3">:</td>
                        <td class="!border-b !border-b-gray-300 py-3">
                            {{ booking?.detail_extra_kasur ?? "-" }}
                        </td>
                    </tr>
                    <tr>
                        <td class="capitalize !border-b !border-b-gray-300 py-3">extra makan</td>
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
                </tbody>
            </table>
        </div>

        <div class="container">
            <div class="text-center mt-[30px] mb-[20px]">
                <span class="subtitle font-glida heading-6 heading text-white">Tulis Ulasan</span>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex gap-3">
                    <h5 class="text-white">Rating :</h5>
                    <div class="flex gap-1">
                        <button @click="form.stars = val" v-for="val in [1, 2, 3, 4, 5]">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                :fill="checkStars(val)"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6 text-yellow-500"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <input
                        v-model="form.name"
                        type="text"
                        placeholder="nama anda"
                        class="bg-white w-full rounded-sm shadow-xl !p-5 placeholder:!text-gray-400"
                        :class="{ 'border !border-red-500': form.errors.name }"
                    />
                    <small class="text-red-500 text-xs">{{ form.errors.name }}</small>
                </div>
                <div>
                    <textarea
                        v-model="form.message"
                        placeholder="Tulis Review anda tentang eDotel"
                        class="bg-white w-full h-[300px] rounded-sm shadow-xl !p-5 placeholder:!text-gray-400 mb-0"
                        :class="{ 'border !border-red-500': form.errors.message }"
                    ></textarea>
                    <small class="text-red-500 text-xs">{{ form.errors.message }}</small>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <Button class="rounded" :is-loading="isSubmitting" @click="handleSubmit">
                    <span class="!text-white">Kirim</span>
                </Button>
            </div>
        </div>
    </div>
</template>
