<script setup>
    import { Link } from "@inertiajs/vue3";

    defineProps({ links: Array });
</script>

<template>
    <div class="flex justify-end mt-2">
        <nav class="card">
            <div class="card-body p-2">
                <ul class="pagination mb-0">
                    <li
                        class="page-item"
                        v-for="link in links"
                        :class="{ active: link.active, disabled: !link.url }"
                    >
                        <Link class="page-link" :href="link.url ?? ''" v-html="link.label" />
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
