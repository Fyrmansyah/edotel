<template>
    <div>
        <div class="d-flex justify-content-between">
            <label class="form-label" :for="$attrs.id">{{ label }}</label>
        </div>
        <div class="input-group input-group-merge">
            <input
                type="password"
                class="form-control"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                v-bind="$attrs"
                v-model="model"
            />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
        <div v-if="errMessage" class="invalid-feedback">{{ errMessage }}</div>
    </div>
</template>

<script setup>
    defineProps({ label: String, errMessage: String });
    const model = defineModel();
</script>
