<template>
    <div class="relative bg-[#f1f1f1] p-[80px_0] lg:p-[120px_0]">
        <div class="absolute right-0 top-0 hidden lg:block">
            <img :src="'/client/assets/images/about/section__shape_2.svg'" alt="" />
        </div>
        <div class="container">
            <div class="mb-[40px] text-center">
                <span
                    class="subtitle font-glida heading-6 heading text-primary before:bg-[url('images/shape/section__style__three-1.html')] after:bg-[url('images/shape/section__style__two.html')]"
                    >Facilities</span
                >
                <h2 class="text-heading mt-[15px]">Hotel Facilities</h2>
            </div>
            <div class="grid grid-cols-1 gap-[25px] md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
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
                        Varied types of rooms, from standard to luxury suites, equipped with
                        essentials like beds.
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
                        On-site security personnel and best surveillance. from standard to luxury
                        suites,Secure for valuables.
                    </p>
                </div>
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <img
                        class="mx-auto mb-[25px]"
                        :src="'/client/assets/images/icon/gym.svg'"
                        alt="icon"
                    />
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#"
                        >Fitness Center</a
                    >
                    <p>
                        Equipped with exercise machines and weights.Offering massages, facials, and
                        other treatments.
                    </p>
                </div>
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <img
                        class="mx-auto mb-[25px]"
                        :src="'/client/assets/images/icon/swimming-pool.svg'"
                        alt="icon"
                    />
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#"
                        >Swimming Pool</a
                    >
                    <p>
                        Indoor or outdoor pools for leisure or exercise.Offering massages, facials,
                        and other treatments
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
