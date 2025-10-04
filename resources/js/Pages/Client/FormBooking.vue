<script setup>
    import { Link, useForm } from "@inertiajs/vue3";
    import Button from "../../Components/Client/Shared/Button.vue";
    import { computed, ref } from "vue";
    import { differenceInDays } from "date-fns";
    import { formatToIdr } from "../../Helpers/shared";

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
    });

    const lama_menginap = computed(() => {
        if (!form.check_in || !form.check_out) {
            return 0;
        }

        return differenceInDays(form.check_out, form.check_in);
    });

    const total = computed(() => {
        let total = lama_menginap.value * props.pricings["Harga Kamar"]?.value;

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
                <span>kembali</span>
            </Link>
            <div class="!shadow-lg rounded-lg px-5 py-6 bg-white">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Nama</label>
                        <input
                            v-model="form.name"
                            type="name"
                            class="border rounded !border-zinc-400 !px-3 !py-1"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.name }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">No Telepon</label>
                        <input
                            v-model="form.no_tlp"
                            type="name"
                            class="border rounded !border-zinc-400 !px-3 !py-1"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.no_tlp }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Check-In</label>
                        <input
                            v-model="form.check_in"
                            type="date"
                            class="border rounded !border-zinc-400 !px-3 !py-1"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.check_in }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Check-Out</label>
                        <input
                            v-model="form.check_out"
                            type="date"
                            class="border rounded !border-zinc-400 !px-3 !py-1"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.check_out }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-zinc-800 !text-sm">Jumlah Orang</label>
                        <input
                            v-model="form.jml_orang"
                            type="number"
                            min="1"
                            class="border rounded !border-zinc-400 !px-3 !py-1"
                        />
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
                            class="border rounded !border-zinc-400 !px-3 !py-1"
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
                            placeholder="Jumlah makanan yang anda pesan"
                        />
                        <span class="text-red-500 !text-sm">{{ form.errors.extra_makan }}</span>
                    </div>
                    <div class="flex items-center gap-2 my-2">
                        <div class="h-[1px] bg-gray-300 flex-1"></div>
                        <p class="text-gray-600">Booking Summary</p>
                        <div class="h-[1px] bg-gray-300 flex-1"></div>
                    </div>
                    <div class="border !border-gray-200 p-3 rounded-lg">
                        <table>
                            <tbody>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Nama
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        {{ form.name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        No Telepon
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        {{ form.no_tlp }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Check In
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        {{ form.check_in }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Check Out
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        {{ form.check_out }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Lama Menghinap
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        {{ lama_menginap }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Jumlah Orang
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        {{ form.jml_orang }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Extra Kasur
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        {{ form.extra_kasur || "-" }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-1 whitespace-nowrap">Extra Makan</td>
                                    <td class="pt-1 px-3">:</td>
                                    <td class="pt-1 w-full">
                                        {{ form.extra_makan ? `${form.extra_makan}x` : "-" }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="border !border-gray-200 p-3 rounded-lg">
                        <table>
                            <tbody>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Biaya Menginap
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        v-if="lama_menginap"
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        {{ formatToIdr(pricings["Harga Kamar"]?.value) }} x
                                        {{ lama_menginap }} malam
                                    </td>
                                    <td
                                        v-else
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                    >
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Biaya Extra Kasur
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                        v-if="form.extra_kasur"
                                    >
                                        {{ formatToIdr(pricings["Extra Kasur"]?.value) }} x
                                        {{ form.extra_kasur }} /malam
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                        v-else
                                    >
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
                                    >
                                        Biaya Extra Makan
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
                                    >
                                        :
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                        v-if="form.extra_makan"
                                    >
                                        {{ formatToIdr(pricings["Extra Makan"]?.value) }} x
                                        {{ form.extra_makan }}
                                    </td>
                                    <td
                                        class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
                                        v-else
                                    >
                                        -
                                    </td>
                                </tr>
                                <tr class="!text-lg font-semibold">
                                    <td class="pt-1 whitespace-nowrap">Total</td>
                                    <td class="pt-1 px-3">:</td>
                                    <td class="pt-1 w-full">{{ formatToIdr(total) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <Button :is-loading="isSubmitting" @click="handleSubmit" class="w-full !mt-8">
                    Submit
                </Button>
            </div>
        </div>
    </div>
</template>
