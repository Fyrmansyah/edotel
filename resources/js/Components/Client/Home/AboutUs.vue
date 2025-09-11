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
                                :src="'/client/assets/images/about/about-1.webp'"
                                alt="about image"
                            />
                        </div>
                        <div
                            class="wow fadeInUp absolute right-[-60px] top-[-30px] hidden rounded-[10px] border-[10px] border-white bg-white md:block"
                        >
                            <img
                                class="rounded-[10px]"
                                :src="'/client/assets/images/about/about-main.webp'"
                                alt=""
                                width="312"
                                height="230"
                            />
                        </div>
                        <div
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
                        </div>
                    </div>
                </div>

                <div class="content prose mt-[30px] md:mt-0">
                    <span
                        class="heading heading-6 text-primary relative left-[65px] mb-[15px] inline-block before:absolute before:bottom-[50%] before:left-[-65px] before:h-[12px] before:w-[52px] before:translate-y-2/4 before:transform before:bg-[url('images/shape/section__style__two.html')] before:bg-no-repeat"
                        >About Us</span
                    >
                    <h2 class="text-heading mb-[30px]">Welcome To Our Moonlit Hotel & Resort</h2>
                    <p class="mb-[45px] max-w-[645px] text-sm">
                        Welcome to Bokinn, where luxury meets comfort in the heart of canada. Since
                        1999, we have been dedicated to providing an exceptional stay for our
                        guests, blending modern amenities with timeless elegance.Our beautifully
                        designed rooms and suites offer stunning views and plush accommodations,
                        ensuring a restful retreat whether you're here for business or leisure.
                    </p>
                    <a class="theme-btn fill rounded-[6px] !border-0" href="#">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</template>
