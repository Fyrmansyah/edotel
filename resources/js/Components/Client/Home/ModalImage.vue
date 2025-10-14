<template>
    <div
        v-if="imgPath"
        class="w-screen h-screen fixed z-[99999999] top-0 bottom-0 right-0 left-0 bg-[rgba(0,0,0,0.5)] flex justify-center items-center"
    >
        <div class="bg-white w-fit max-w-4xl rounded-xl p-3">
            <button @click="showModalImg(null)">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <img :src="imgPath" class="rounded-lg" />
        </div>
    </div>
</template>

<script setup>
    import { inject } from "vue";

    const imgPath = inject("imgPath");
    const showModalImg = inject("showModalImg");
</script>
