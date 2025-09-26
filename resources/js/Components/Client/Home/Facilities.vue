<template>
    <div class="relative bg-[#f1f1f1] p-[80px_0] lg:p-[120px_0]">
        <div class="absolute right-0 top-0 hidden lg:block">
            <img :src="'/client/assets/images/about/section__shape_2.svg'" alt="" />
        </div>
        <div class="container">
            <div class="mb-[40px] text-center">
                <span class="subtitle font-glida heading-6 heading text-primary">Facilities</span>
                <h2 class="text-heading mt-[15px]">Hotel Facilities</h2>
            </div>
            <div class="grid grid-cols-1 gap-[25px] md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <img
                        class="mx-auto mb-[25px]"
                        :src="'/client/assets/images/icon/bed.svg'"
                        alt="icon"
                    />
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#"
                        >Rooms and Suites</a
                    >
                    <p>
                        ruangan kamar yang nyaman, bersih, dan ber-ac. dengan kasur yang empuk
                        membuat tidur nyenyak
                    </p>
                </div>
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <img
                        class="mx-auto mb-[25px]"
                        :src="'/client/assets/images/icon/security.svg'"
                        alt="icon"
                    />
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#"
                        >24-Hour Security</a
                    >
                    <p>
                        berdiri di kawasan yang aman, dan dijaga selama 24 jam. karena keamanan
                        pelanggan sangat penting bagi kami
                    </p>
                </div>
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <img
                        class="mx-auto mb-[25px]"
                        :src="'/client/assets/images/icon/gym.svg'"
                        alt="icon"
                    />
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#">Caffe</a>
                    <p>
                        Tersedia caffe dengan berbagi menu makanan bergizi dan lezat dengan harga
                        yang terjangkau
                    </p>
                </div>
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <img
                        class="mx-auto mb-[25px]"
                        :src="'/client/assets/images/icon/gym.svg'"
                        alt="icon"
                    />
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#">Laundry</a>
                    <p>Tersedia juga laundry. wangi, bersih, lembut</p>
                </div>
            </div>
        </div>
    </div>
</template>
