<template>
    <div class="relative bg-white pt-[60px]">
        <div class="container">
            <div
                class="grid sm:grid-cols-2 lg:grid-cols-3 gap-[30px] lg:flex justify-between mb-[40px] relative z-[1]"
            >
                <div class="rts__widget">
                    <a href="index.html">
                        <img
                            class="footer__logo max-w-[50px]"
                            :src="'/shared/images/logo.png'"
                            alt="footer logo"
                            style="max-width: 250px"
                        />
                    </a>
                    <p class="max-w-[290px] mt-[20px]">
                        Tentang hotel, Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Error, possimus odio! Modi ea quisquam eveniet cum velit cumque? Tempora et
                        consequuntur
                    </p>
                </div>

                <!-- <div class="rts__widget">
                    <span class="block text-[20px] heading text-heading capitalize mb-[20px]"
                        >quick links</span
                    >
                    <ul class="flex flex-col gap-[10px]">
                        <li><a class="hover:text-primary" href="#">Room & Suites</a></li>
                        <li><a class="hover:text-primary" href="#">Dining</a></li>
                        <li><a class="hover:text-primary" href="#">Spa & Wellness</a></li>
                        <li><a class="hover:text-primary" href="#">Special Offers</a></li>
                    </ul>
                </div> -->
                <div class="rts__widget">
                    <span class="block text-[20px] heading text-heading capitalize mb-[20px]"
                        >Contact Us</span
                    >
                    <ul class="flex flex-col gap-[10px]">
                        <li>
                            <a
                                class="flex gap-2 items-center"
                                aria-label="footer__contact"
                                href="tel:+12505550199"
                                ><i class="flaticon-phone-flip"></i> +62 0895-4173-00072
                            </a>
                        </li>
                        <li>
                            <a
                                class="flex gap-2 items-center"
                                aria-label="footer__contact"
                                href="mailto:UjJw6@example.com"
                                ><i class="flaticon-envelope"></i>test@gmail.com</a
                            >
                        </li>
                        <li>
                            <a class="flex gap-2 items-center" aria-label="footer__contact" href="#"
                                ><i class="flaticon-marker"></i>Jl. Smea No.4, Wonokromo, Kec.
                                Wonokromo, Surabaya</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="rts__widget lg:min-w-[400px] lg:max-w-[400px] min-w-[300px] w-full">
                    <span class="block text-[20px] heading text-heading capitalize mb-[20px]">
                        Lihat Peta
                    </span>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126634.18930500966!2d112.6653277611887!3d-7.318083445863951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb9e87849b15%3A0x19be44f1482c777b!2sSMESA%20Edotel%20Syariah%20Surabaya%20Mitra%20RedDoorz!5e0!3m2!1sen!2sid!4v1757523179271!5m2!1sen!2sid"
                        width="400"
                        height="300"
                        style="border: 0"
                        allowfullscreen="true"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </div>
        </div>
        <div class="border-t-[1px] border-[#65676B] border-opacity-20 p-[40px_0] relative z-10">
            <div class="container">
                <div
                    class="flex flex-wrap md:justify-between justify-center items-center gap-[30px]"
                >
                    <p class="mb-0">Copyright © 2025 eDotel. All rights reserved.</p>
                    <div class="flex items-center gap-[30px]">
                        <a class="pr-[25px] border-r-[1px] border-[#65676b] leading-4" href="#"
                            >Facebook</a
                        >
                        <a class="pr-[25px] border-r-[1px] border-[#65676b] leading-4" href="#"
                            >Instagram</a
                        >
                        <a class="leading-4" href="#">Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
