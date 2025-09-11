<template>
    <div
        class="advance__form is__home__one relative mt-[20px] sm:mt-[-50px] sm:mt-[20px] md:mt-[-50px]"
    >
        <div class="px-4 xl:container">
            <form
                class="advance__search relative z-10 rounded-[16px] bg-white px-[22px] py-[20px] shadow-[0_30px_30px_rgba(175,175,175,0.16)] dark:bg-[#1B1B1B] dark:text-white dark:shadow-none"
                action="https://moonlit-tailwind.netlify.app/room-two.html"
                method="post"
            >
                <div
                    class="grid grid-cols-1 items-center justify-between gap-[25px] sm:grid-cols-2 md:grid md:grid-cols-3 lg:flex"
                >
                    <!-- single input -->
                    <div
                        class="relative block w-full border-r-0 border-[#E4E4E4] pr-[25px] sm:border-r-[1px] dark:border-[#383838]"
                    >
                        <label
                            class="font-glida text-heading mb-[10px] block text-[20px] dark:text-white"
                            for="check__in"
                            >Check In</label
                        >
                        <input
                            class="relative top-[2px] z-10 ml-[20px] w-[100%] appearance-none bg-white p-[0_5px] outline-none dark:bg-[#1B1B1B]"
                            id="check__in"
                            name="check__in"
                            type="text"
                            placeholder="15 Jun 2024"
                            required
                        />
                        <div
                            class="before:text-heading font-flaticon z-1 absolute left-0 top-[38px] w-[100%] before:absolute before:bottom-0 before:right-[20px] before:top-0 before:z-10 before:content-['\f122'] dark:text-white dark:before:text-white"
                        >
                            <i class="flaticon-calendar"></i>
                        </div>
                    </div>
                    <!-- single input end -->

                    <!-- single input -->
                    <div
                        class="relative block w-full border-[#E4E4E4] pr-[25px] sm:border-r-0 md:border-r-[1px] dark:border-[#383838]"
                    >
                        <label
                            class="font-glida text-heading mb-[10px] block text-[20px] dark:text-white"
                            for="check__out"
                            >Check Out</label
                        >
                        <input
                            class="relative top-[2px] z-10 ml-[20px] w-[100%] appearance-none bg-white p-[0_5px] outline-none dark:bg-[#1B1B1B]"
                            id="check__out"
                            name="check__out"
                            type="text"
                            placeholder="15 May 2024"
                            required
                        />
                        <div
                            class="before:text-heading font-flaticon z-1 absolute left-0 top-[38px] w-[100%] before:absolute before:bottom-0 before:right-[20px] before:top-0 before:z-10 before:content-['\f122'] dark:text-white dark:before:text-white"
                        >
                            <i class="flaticon-calendar"></i>
                        </div>
                    </div>
                    <!-- single input end -->

                    <!-- single input -->
                    <div
                        class="relative block w-full border-[#E4E4E4] pr-[25px] sm:border-r-[1px] md:border-r-0 lg:border-r-[1px] dark:border-[#383838]"
                    >
                        <label
                            class="font-glida text-heading mb-[10px] block text-[20px] dark:text-white"
                            for="adult"
                            >Adult</label
                        >
                        <select
                            class="relative top-[2px] z-10 ml-[20px] w-[100%] appearance-none bg-white p-[0_5px] outline-none dark:bg-[#1B1B1B]"
                            id="adult"
                            name="adult"
                        >
                            <option value="1">1 Person</option>
                            <option value="2">2 Person</option>
                            <option value="3">3 Person</option>
                            <option value="4">4 Person</option>
                            <option value="5">5 Person</option>
                            <option value="6">6 Person</option>
                            <option value="7">7 Person</option>
                            <option value="8">8 Person</option>
                            <option value="9">9 Person</option>
                        </select>
                        <div
                            class="before:text-heading font-flaticon z-1 absolute left-0 top-[38px] w-[100%] before:absolute before:bottom-0 before:right-[20px] before:top-0 before:z-10 before:content-['\f122'] dark:text-white dark:before:text-white"
                        >
                            <i class="flaticon-user"></i>
                        </div>
                    </div>
                    <!-- single input end -->

                    <!-- single input -->
                    <div
                        class="relative block w-full border-[#E4E4E4] pr-[25px] sm:border-r-0 md:border-r-[1px] dark:border-[#383838]"
                    >
                        <label
                            class="font-glida text-heading mb-[10px] block text-[20px] dark:text-white"
                            for="child"
                            >Child</label
                        >
                        <select
                            class="relative top-[2px] z-10 ml-[20px] w-[100%] appearance-none bg-white p-[0_5px] outline-none dark:bg-[#1B1B1B]"
                            id="child"
                            name="child"
                        >
                            <option value="1">1 Child</option>
                            <option value="2">2 Child</option>
                            <option value="3">3 Child</option>
                            <option value="4">4 Child</option>
                            <option value="5">5 Child</option>
                            <option value="6">6 Child</option>
                            <option value="7">7 Child</option>
                            <option value="8">8 Child</option>
                            <option value="9">9 Child</option>
                        </select>
                        <div
                            class="before:text-heading font-flaticon z-1 absolute left-0 top-[38px] w-[100%] before:absolute before:bottom-0 before:right-[20px] before:top-0 before:z-10 before:content-['\f122'] dark:text-white dark:before:text-white"
                        >
                            <i class="flaticon-user"></i>
                        </div>
                    </div>
                    <!-- single input end -->

                    <!-- submit button -->
                    <button
                        class="theme-btn btn-style fill no-border h-[56px] min-w-[140px] rounded-[6px]"
                    >
                        <span>Check Now</span>
                    </button>
                    <!-- submit button end -->
                </div>
            </form>
        </div>
    </div>
</template>
