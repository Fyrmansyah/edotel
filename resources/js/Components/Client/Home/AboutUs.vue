<template>
    <div class="is__home__one relative p-[80px_0] lg:p-[120px_0]">
        <div class="absolute left-0 top-[50%] hidden translate-y-[-50%] transform lg:block">
            <img :src="'/client/assets/images/offer/section__bg.svg'" alt="" />
        </div>
        <div class="container">
            <div class="flex flex-wrap items-center gap-[30px] lg:flex-nowrap lg:gap-0">
                <div
                    class="image h-[100%] w-[100%] sm:mr-0 sm:h-auto sm:w-auto md:ml-[85px] md:mr-[85px]"
                >
                    <div class="wow fadeInUp relative">
                        <div class="jara-mask-1 jarallax sm:min-h-[580px] sm:min-w-[485px]">
                            <img
                                class="jarallax-img"
                                :src="'/client/assets/images/main/bed-4.JPG'"
                                alt="about image"
                            />
                        </div>
                        <div
                            class="wow fadeInUp absolute right-[-60px] top-[-30px] hidden rounded-[10px] border-[10px] border-white bg-white md:block"
                        >
                            <img
                                class="rounded-[10px]"
                                :src="'/client/assets/images/main/bed-3.JPG'"
                                alt=""
                                width="312"
                                height="230"
                            />
                        </div>
                        <!-- <div
                            class="image__card wow fadeInUp !bottom-[40px] !left-[-0px] top-[unset] rounded-[10px] md:!left-[-80px]"
                            data-wow-delay=".5s"
                        >
                            <div
                                class="bg-gray text-primary grid h-[82px] min-w-[82px] place-items-center rounded-[10px] text-[45px]"
                            >
                                <i class="flaticon-people"></i>
                            </div>
                            <div class="content">
                                <span class="heading heading-5 text-heading">50+</span>
                                <p>Experience Staff</p>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="content prose mt-[30px] md:mt-0">
                    <span
                        class="heading heading-6 text-primary relative left-[65px] mb-[15px] inline-block before:absolute before:bottom-[50%] before:left-[-65px] before:h-[12px] before:w-[52px] before:translate-y-2/4 before:transform before:bg-no-repeat"
                        >About Us</span
                    >
                    <h2 class="text-heading mb-[30px]">SMESA Edotel Syariah Surabaya</h2>
                    <p class="mb-[45px] max-w-[645px] text-sm">
                        Penginapan syariah yang nyaman dan strategis di Surabaya, dikelola dengan
                        standar profesional serta menjadi bagian dari praktik perhotelan SMK Negeri
                        1 Surabaya.
                    </p>
                    <!-- <a class="theme-btn fill rounded-[6px] !border-0" href="#">Learn More</a> -->
                </div>
            </div>
        </div>
    </div>
</template>
