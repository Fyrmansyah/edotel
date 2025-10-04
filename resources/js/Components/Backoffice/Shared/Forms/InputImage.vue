<template>
    <div>
        <label v-if="label" :for="$attrs.id" class="form-label">{{ label }}</label>
        <input
            type="file"
            class="form-control"
            :class="{ 'is-invalid': errMessage }"
            v-bind="$attrs"
        />
        <div v-if="errMessage" class="invalid-feedback">{{ errMessage }}</div>
    </div>
</template>

<script setup>
    defineProps({
        label: String,
        labelFor: String,
        errMessage: String,
    });
    const model = defineModel();
</script>
