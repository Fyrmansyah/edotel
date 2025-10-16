<script setup>
    import { useForm, usePage } from "@inertiajs/vue3";
    import { ref, watch } from "vue";
    import Button from "../Shared/Button.vue";
    import { Alert } from "../../../Helpers/sweet-alert";

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

    const form = useForm({
        stars: 1,
        message: "",
        name: "",
    });
    const isSubmitting = ref(false);

    const handleSubmit = () => {
        isSubmitting.value = true;
        form.post("/review", {
            onFinish: () => (isSubmitting.value = false),
            preserveScroll: true,
        });
    };

    const checkStars = (star) => {
        return form.stars >= star ? "currentColor" : "none";
    };
</script>

<template>
    <div class="relative bg-gray py-24" id="pricings">
        <div class="absolute right-0 top-0 hidden lg:block">
            <img :src="'/client/assets/images/about/section__shape_2.svg'" alt="" />
        </div>
        <div class="container">
            <div class="text-center mb-[60px]">
                <span class="subtitle font-glida heading-6 heading text-primary">Tulis Ulasan</span>
                <h2 class="text-heading mt-[15px]">Ulasan</h2>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex gap-3">
                    <h5>Rating :</h5>
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
                        class="bg-white w-full rounded-lg shadow-xl !p-5 placeholder:!text-gray-400"
                        :class="{ 'border !border-red-500': form.errors.name }"
                    />
                    <small class="text-red-500 text-xs">{{ form.errors.name }}</small>
                </div>
                <div>
                    <textarea
                        v-model="form.message"
                        placeholder="Tulis Review anda tentang eDotel"
                        class="bg-white w-full h-[300px] rounded-lg shadow-xl !p-5 placeholder:!text-gray-400 mb-0"
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
