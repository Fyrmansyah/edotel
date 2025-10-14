<script setup>
    import { Swiper, SwiperSlide } from "swiper/vue";
    import { Autoplay } from "swiper/modules";
    import { inject } from "vue";

    import "swiper/css";

    defineProps({ photos: Array });
    const showModalImg = inject("showModalImg");
</script>

<template>
    <div class="relative bg-gray p-[80px_0] lg:p-[120px_0]">
        <div class="container">
            <div class="text-center mb-[40px]">
                <span class="subtitle font-glida heading-6 heading text-primary">Gallery</span>
                <h2 class="text-heading mt-[15px]">Gallery Photo</h2>
            </div>
        </div>
        <Swiper
            :slides-per-view="5"
            :space-between="25"
            :loop="true"
            :modules="[Autoplay]"
            :autoplay="{ delay: 2500, disableOnInteraction: false }"
            :breakpoints="{
                0: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 25,
                },
            }"
        >
            <SwiperSlide v-for="p in photos">
                <img
                    :key="'photo-' + p.id"
                    :src="'/storage/' + p.path"
                    class="rounded w-full aspect-square object-cover cursor-zoom-in !border-8 border-white"
                    @click="showModalImg('/storage/' + p.path)"
                />
            </SwiperSlide>
        </Swiper>
    </div>
</template>
