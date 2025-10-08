<template>
    <tr v-bind="$attrs">
        <td
            class="align-baseline !border-b !border-b-gray-200 py-1 whitespace-nowrap"
            :class="{ 'border-none': noBorder }"
        >
            {{ text1 }}
        </td>
        <td
            class="align-baseline !border-b !border-b-gray-200 py-1 px-3"
            :class="{ 'border-none': noBorder }"
        >
            :
        </td>
        <td
            class="align-baseline !border-b !border-b-gray-200 py-1 w-full"
            :class="{ 'border-none': noBorder }"
        >
            {{ text2 }}
        </td>
    </tr>
</template>

<script setup>
    defineProps({ text1: String, text2: String, noBorder: Boolean });
</script>
