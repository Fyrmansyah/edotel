<script setup>
    import { Swiper, SwiperSlide } from "swiper/vue";
    import { Autoplay } from "swiper/modules";

    import "swiper/css";

    defineProps({ photos: Array });
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
        >
            <SwiperSlide v-for="p in photos">
                <img
                    :key="'photo-' + p.id"
                    :src="'/storage/' + p.path"
                    class="rounded w-full aspect-square object-cover"
                    height="300"
                    width="300"
                    alt=""
                />
            </SwiperSlide>
        </Swiper>
    </div>
</template>
