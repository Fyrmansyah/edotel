<script setup lang="ts">
    import { Swiper, SwiperSlide } from "swiper/vue";
    import { Autoplay } from "swiper/modules";

    import "swiper/css";
</script>

<template>
    <div class="relative bg-gray pt-[90px] lg:pt-[120px]">
        <div class="container">
            <div class="text-center mb-[40px]">
                <span
                    class="subtitle font-glida heading-6 heading text-primary before:bg-[url('images/shape/section__style__three-1.html')] after:bg-[url('/client/images/shape/section__style__two.html')]"
                    >Gallery</span
                >
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
            <SwiperSlide>
                <img
                    :src="'/client/assets/images/insta/5.webp'"
                    class="rounded-[6px_6px_0_0] w-full"
                    height="300"
                    width="300"
                    alt=""
                />
            </SwiperSlide>
            <SwiperSlide>
                <img
                    :src="'/client/assets/images/insta/5.webp'"
                    class="rounded w-full"
                    height="300"
                    width="300"
                    alt=""
                />
            </SwiperSlide>
            <SwiperSlide>
                <img
                    :src="'/client/assets/images/insta/5.webp'"
                    class="rounded-[6px_6px_0_0] w-full"
                    height="300"
                    width="300"
                    alt=""
                />
            </SwiperSlide>
            <SwiperSlide>
                <img
                    :src="'/client/assets/images/insta/5.webp'"
                    class="rounded-[6px_6px_0_0] w-full"
                    height="300"
                    width="300"
                    alt=""
                />
            </SwiperSlide>
            <SwiperSlide>
                <img
                    :src="'/client/assets/images/insta/5.webp'"
                    class="rounded-[6px_6px_0_0] w-full"
                    height="300"
                    width="300"
                    alt=""
                />
            </SwiperSlide>
            <SwiperSlide>
                <img
                    :src="'/client/assets/images/insta/5.webp'"
                    class="rounded-[6px_6px_0_0] w-full"
                    height="300"
                    width="300"
                    alt=""
                />
            </SwiperSlide>
        </Swiper>
    </div>
</template>
