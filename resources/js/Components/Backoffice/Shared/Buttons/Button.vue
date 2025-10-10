<template>
    <button class="btn" :class="variant" :disabled="props.isLoading">
        <div v-if="props.isLoading" class="flex gap-2 items-center justify-center">
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        </div>
        <slot v-else />
    </button>
</template>

<script setup lang="ts">
    import { computed } from "vue";

    const props = defineProps<{
        variant: "primary" | "danger" | "warning" | "success" | "secondary";
        isLoading?: boolean;
    }>();

    const variant = computed(() => `btn-${props.variant}`);
</script>
