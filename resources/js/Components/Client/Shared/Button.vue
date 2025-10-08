<template>
    <button
        class="!px-5 !py-1 rounded-lg !bg-[#AB8A62] text-white"
        :class="{
            'opacity-60': isLoading,
            '!bg-gray-100 border !border-gray-200 !text-black': variant === 'gray',
        }"
        :disabled="props.isLoading"
    >
        <div v-if="props.isLoading" class="flex flex-1 gap-2 items-center justify-center">
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        </div>
        <slot v-else />
    </button>
</template>

<script setup lang="ts">
    const props = defineProps<{ isLoading?: boolean; variant?: "primary" | "gray" }>();
</script>
