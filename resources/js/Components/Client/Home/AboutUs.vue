<script setup>
    import { inject } from "vue";

    const showModalImg = inject("showModalImg");
</script>

<template>
    <div id="about-us" class="is__home__one relative p-[80px_0] lg:p-[120px_0]">
        <div class="absolute left-0 top-[50%] hidden translate-y-[-50%] transform lg:block">
            <img :src="'/client/assets/images/offer/section__bg.svg'" alt="" />
        </div>
        <div class="container">
            <div class="mb-[100px] text-center">
                <span class="subtitle font-glida heading-4 heading text-primary">About Us</span>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[30px]">
                <div class="wow fadeInUp">
                    <img
                        class="jarallax-img rounded-xl w-full cursor-zoom-in"
                        :src="'/client/assets/images/main/foto_depan.jpg'"
                        alt="about image"
                        @click="showModalImg('/client/assets/images/main/foto_depan.jpg')"
                    />
                    <div class="grid grid-cols-3 w-full gap-3 mt-3">
                        <img
                            :src="'/client/assets/images/main/bartender.jpg'"
                            @click="showModalImg('/client/assets/images/main/bartender.jpg')"
                            class="w-full rounded-lg cursor-zoom-in"
                        />
                        <img
                            :src="'/client/assets/images/main/tangga_loby.jpg'"
                            @click="showModalImg('/client/assets/images/main/tangga_loby.jpg')"
                            class="w-full rounded-lg cursor-zoom-in"
                        />
                        <img
                            :src="'/client/assets/images/main/loby_admin.jpg'"
                            @click="showModalImg('/client/assets/images/main/loby_admin.jpg')"
                            class="w-full rounded-lg cursor-zoom-in"
                        />
                    </div>
                </div>

                <div class="content prose mt-[30px] md:mt-0">
                    <h2 class="text-heading mb-[30px]">SMESA Edotel Syariah Surabaya</h2>
                    <p class="mb-[45px] max-w-[645px] text-sm">
                        SMESA Edotel Syariah Surabaya merupakan Laboratorium Konsentrasi Keahlian
                        Perhotelan SMKN 1 Surabaya, terletak di Jl. SMEA No. 4 Wonokromo Surabaya,
                        Jawa Timur, Indonesia. Edotel juga disewkan untuk umum dengan menawarkan
                        beberapa fasilitas yang akan membuat pengalaman menginap Anda semakin
                        nyaman. Fasilitas yang tersedia di hotel ini antara lain adalah: Amenities,
                        Coffee Corner, tempat parkir mobil, Wi-Fi dll.
                    </p>
                    <!-- <a class="theme-btn fill rounded-[6px] !border-0" href="#">Learn More</a> -->
                </div>
            </div>
        </div>
    </div>
</template>
