<script setup>
    defineProps({ pricings: Object });
</script>
<template>
    <div class="relative py-24">
        <div class="absolute bottom-0 left-0 hidden lg:block">
            <img :src="'/client/assets/images/about/section__shape.svg'" alt="" />
        </div>
        <div class="container">
            <div class="text-center mb-[40px]">
                <span
                    class="subtitle font-glida heading-6 heading text-primary before:bg-[url('images/shape/section__style__three-1.html')] after:bg-[url('/client/images/shape/section__style__two.html')]"
                    >Pricing</span
                >
                <h2 class="text-heading mt-[15px]">Daftar Harga</h2>
            </div>
            <div class="xl:flex gap-[30px] grid">
                <div
                    class="rounded-[10px] overflow-hidden xl:max-w-[532px] bg-heading lg:flex xl:flex-col"
                >
                    <a href="#" class="lg:flex-1 xl:flex-[unset]">
                        <img :src="'/client/assets/images/main/kamar.JPG'" alt="" />
                    </a>
                    <div class="p-[30px_30px_30px_40px]">
                        <a href="#" class="heading heading-4 text-white mb-[20px] block"
                            >Booking Kamar</a
                        >
                        <ul class="grid grid-cols-1 gap-[20px] leading-none text-white">
                            <li class="flex items-center gap-2">
                                <i class="flaticon-check-circle"></i> Kasur, Selimut, Bantal, dan
                                Guling
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="flaticon-check-circle"></i> Customer Service 24 jam
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="flaticon-check-circle"></i> Handuk, Pasta Gigi, dan Sabun
                            </li>
                        </ul>
                        <span class="heading heading-3 block mt-[25px] text-primary"
                            >Rp{{ pricings["Harga Kamar"].toLocaleString("id") }}</span
                        >
                    </div>
                </div>
                <div class="w-full grid grid-cols-1 gap-[30px]">
                    <div
                        class="rounded-[10px] overflow-hidden md:flex items-center bg-heading grid"
                    >
                        <img
                            :src="'/client/assets/images/main/extra_kasur.JPG'"
                            class="w-full h-full object-cover md:w-[265px]"
                            height="310"
                            width="265"
                            alt=""
                        />
                        <div class="p-[30px_30px_30px_30px]">
                            <a href="#" class="heading heading-5 text-white mb-[20px] block"
                                >Extra Kasur</a
                            >
                            <span class="heading heading-4 block mt-[25px] text-primary"
                                >Rp{{ pricings["Extra Kasur"].toLocaleString("id") }}</span
                            >
                        </div>
                    </div>

                    <div
                        class="rounded-[10px] overflow-hidden md:flex items-center bg-heading grid"
                    >
                        <img
                            :src="'/client/assets/images/main/extra_makanan.JPG'"
                            class="w-full h-full object-cover md:w-[265px]"
                            height="310"
                            width="265"
                            alt=""
                        />
                        <div class="p-[30px_30px_30px_30px]">
                            <a href="#" class="heading heading-5 text-white mb-[20px] block"
                                >Extra Makanan</a
                            >
                            <span class="heading heading-4 block mt-[25px] text-primary"
                                >Rp{{ pricings["Extra Makan"].toLocaleString("id") }}</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
