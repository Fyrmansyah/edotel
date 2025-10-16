<script setup>
    import { Link, useForm, usePage } from "@inertiajs/vue3";
    import Button from "../../Components/Client/Shared/Button.vue";
    import { ref, watch } from "vue";
    import { Alert } from "../../Helpers/sweet-alert";
    import { goBack } from "../../Helpers/shared";

    const isSubmitting = ref(false);
    const form = useForm({
        keyword: null,
    });

    const page = usePage();

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

    const handleSubmit = () => {
        isSubmitting.value = true;
        form.post("/booking/find", {
            onFinish: () => {
                isSubmitting.value = false;
            },
        });
    };
</script>

<template>
    <div class="px-5 py-8 w-screen min-h-screen bg-[#AB8A62]">
        <div class="max-w-lg mx-auto">
            <button @click="goBack" class="text-white flex gap-2 items-center mb-5">
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
            </button>
            <div class="bg-white p-3 rounded-lg">
                <div class="flex flex-col gap-1">
                    <label class="text-zinc-800 !text-sm">No Telepon atau booking id</label>
                    <input
                        v-model="form.keyword"
                        type="text"
                        class="border rounded !border-zinc-400 !px-3 !py-1 placeholder:!text-gray-400"
                    />
                    <span class="text-red-500 !text-sm">{{ form.errors.keyword }}</span>
                </div>
                <Button
                    :is-loading="isSubmitting"
                    @click="handleSubmit"
                    type="button"
                    class="w-full !mt-8"
                >
                    Cari
                </Button>
            </div>
        </div>
    </div>
</template>
