<script setup>
    import { Link, useForm } from "@inertiajs/vue3";
    import Button from "../../Components/Client/Shared/Button.vue";
    import { computed, ref } from "vue";
    import { differenceInDays } from "date-fns";
    import { formatToIdr } from "../../Helpers/shared";
    import { PRICING_KEY } from "../../Helpers/constant";
    import BookingDetailItem from "../../Components/Client/Booking/BookingDetailItem.vue";

    const props = defineProps({ pricings: Object });

    console.log(props);

    const isSubmitting = ref(false);
    const form = useForm({
        name: null,
        no_tlp: null,
        check_in: null,
        check_out: null,
        jml_orang: null,
        extra_kasur: null,
        extra_makan: null,
        jenis_kamar: null,
    });

    const lama_menginap = computed(() => {
        if (!form.check_in || !form.check_out) {
            return 0;
        }

        return differenceInDays(form.check_out, form.check_in);
    });

    const jenisKamarKey = computed(() => {
        const key = {
            medium: PRICING_KEY.kamar_medium,
            large: PRICING_KEY.kamar_large,
        };

        return key[form.jenis_kamar];
    });

    const total = computed(() => {
        let total = lama_menginap.value * props.pricings[jenisKamarKey.value]?.value;

        if (form.extra_kasur) {
            total += lama_menginap.value * form.extra_kasur * props.pricings["Extra Kasur"]?.value;
        }

        if (form.extra_makan) {
            total += form.extra_makan * props.pricings["Extra Makan"]?.value;
        }

        return total;
    });

    const handleSubmit = () => {
        isSubmitting.value = true;
        form.post("/booking", {
            onFinish: () => (isSubmitting.value = false),
        });
    };
</script>

<template>
    <div class="px-5 py-8 w-screen min-h-screen bg-[#AB8A62]">
        <div class="max-w-lg mx-auto">
            <Link href="/" class="text-white flex gap-2 items-center mb-5">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
                    />
                </svg>
                <span>kembali ke beranda</span>
            </Link>
            <div class="flex bg-[#f6cc9a] p-3 rounded-lg mb-4">
                <p class="text-black">
                    Apa anda sudah melakukan booking sebelumnya?
                    <Link class="underline font-bold" href="/booking/find"> Klik disini </Link>
                    untuk melihat booking anda
                </p>
            </div>
            <div class="!shadow-lg rounded-lg px-5 py-6 bg-white">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Nama</label>
                        <input
                            v-model="form.name"
                            type="text"
                            placeholder="nama anda"
                            class="border rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.name }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">No Telepon</label>
                        <input
                            v-model="form.no_tlp"
                            type="text"
                            placeholder="masukkan nomor telepon anda"
                            class="border rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.no_tlp }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Check-In</label>
                        <input
                            v-model="form.check_in"
                            type="date"
                            class="border rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.check_in }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Check-Out</label>
                        <input
                            v-model="form.check_out"
                            type="date"
                            class="border rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.check_out }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Jumlah Orang</label>
                        <input
                            v-model="form.jml_orang"
                            type="number"
                            min="1"
                            placeholder="jumlah orang yang akan menginap"
                            class="border rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.jml_orang }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Jenis Kamar</label>
                        <div
                            class="!border !rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                        >
                            <select class="!appearance-auto w-full" v-model="form.jenis_kamar">
                                <option disabled>pilih jenis kamar</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select>
                        </div>
                        <span class="text-red-500 !text-sm">{{ form.errors.jml_orang }}</span>
                    </div>
                    <div class="flex items-center gap-2 my-2">
                        <div class="h-[1px] bg-gray-300 flex-1"></div>
                        <p class="text-gray-600">Tambahan</p>
                        <div class="h-[1px] bg-gray-300 flex-1"></div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Extra Kasur (optional)</label>
                        <input
                            v-model="form.extra_kasur"
                            type="number"
                            min="1"
                            placeholder="jumlah kasur tambahan"
                            class="border rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.extra_kasur }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Extra Makan (optional)</label>
                        <input
                            v-model="form.extra_makan"
                            type="number"
                            min="1"
                            class="border rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                            placeholder="jumlah makanan yang anda pesan"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.extra_makan }}</span>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center gap-2 my-2">
                            <div class="h-[1px] bg-gray-300 flex-1"></div>
                            <p class="text-gray-600">Ringkasan</p>
                            <div class="h-[1px] bg-gray-300 flex-1"></div>
                        </div>
                        <div class="border !border-gray-200 p-3 rounded-lg">
                            <table>
                                <tbody>
                                    <BookingDetailItem text1="Nama" :text2="form.name" />
                                    <BookingDetailItem text1="No Telepon" :text2="form.no_tlp" />
                                    <BookingDetailItem text1="Check In" :text2="form.check_in" />
                                    <BookingDetailItem text1="Check Out" :text2="form.check_out" />
                                    <BookingDetailItem
                                        text1="Lama Menginap"
                                        :text2="(lama_menginap ?? 0) + ' malam'"
                                    />
                                    <BookingDetailItem
                                        text1="Jumlah Orang"
                                        :text2="form.jml_orang"
                                    />
                                    <BookingDetailItem
                                        text1="Jenis Kamar"
                                        :text2="form.jenis_kamar"
                                    />
                                    <BookingDetailItem
                                        text1="Extra Kasur"
                                        :text2="form.extra_kasur || '-'"
                                    />
                                    <BookingDetailItem
                                        text1="Extra Makan"
                                        no-border
                                        :text2="form.extra_makan || '-'"
                                    />
                                </tbody>
                            </table>
                        </div>
                        <div class="border !border-gray-200 p-3 rounded-lg">
                            <table>
                                <tbody>
                                    <BookingDetailItem
                                        v-if="lama_menginap"
                                        text1="Biaya Menginap"
                                        :text2="`${formatToIdr(
                                            pricings[jenisKamarKey]?.value,
                                        )} x ${lama_menginap} malam`"
                                    />
                                    <BookingDetailItem
                                        v-if="form.extra_kasur"
                                        text1="Biaya Extra Kasur"
                                        :text2="`${formatToIdr(
                                            pricings[PRICING_KEY.extra_kasur]?.value,
                                        )} x ${form.extra_kasur} x ${lama_menginap} malam`"
                                    />
                                    <BookingDetailItem
                                        v-if="form.extra_makan"
                                        text1="Biaya Extra Makan"
                                        :text2="`${formatToIdr(
                                            pricings[PRICING_KEY.extra_makan]?.value,
                                        )} x ${form.extra_makan}`"
                                    />
                                    <BookingDetailItem
                                        text1="Total"
                                        :text2="formatToIdr(total)"
                                        no-border
                                        class="!text-lg font-semibold"
                                    />
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <Button
                    :is-loading="isSubmitting"
                    @click="handleSubmit"
                    type="button"
                    class="w-full !mt-8"
                >
                    Kirim
                </Button>
            </div>
        </div>
    </div>
</template>
