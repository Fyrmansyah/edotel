<script setup lang="ts">
    import { Link } from "@inertiajs/vue3";

    interface Path {
        label: string;
        href?: string;
    }

    const props = defineProps<{
        paths: Path[];
    }>();
</script>

<template>
    <h4 class="fw-bold py-3 mb-0 flex gap-2 items-center">
        <template v-for="(path, idx) in props.paths" :key="idx">
            <Link
                v-if="idx !== props.paths.length - 1"
                class="text-muted fw-light"
                :href="path.href"
                >{{ path.label }}</Link
            >
            <span v-else>
                {{ path.label }}
            </span>
            <span v-if="idx !== props.paths.length - 1">/</span>
        </template>
    </h4>
</template>
