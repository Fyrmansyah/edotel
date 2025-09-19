<template>
    <button class="btn" :class="variant" :disabled="props.isLoading">
        <div v-if="props.isLoading" class="flex gap-2 items-center">
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        </div>
        <slot v-else />
    </button>
</template>

<script setup lang="ts">
    const props = defineProps<{ variant: "primary" | "danger" | "warning"; isLoading: boolean }>();
    const variant = `btn-${props.variant}`;
</script>
