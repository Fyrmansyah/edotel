<template>
    <div>
        <div class="d-flex justify-content-between">
            <label class="form-label" :for="$attrs.id">{{ label }}</label>
        </div>
        <div class="input-group input-group-merge">
            <input
                :type="isVisiblePass ? 'text' : 'password'"
                class="form-control"
                :class="{ 'is-invalid': errMessage }"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                v-bind="$attrs"
                v-model="model"
            />
            <span class="input-group-text cursor-pointer" @click="isVisiblePass = !isVisiblePass">
                <i :class="isVisiblePass ? 'bx bx-show' : 'bx bx-hide'"></i>
            </span>
        </div>
        <span class="invalid-feedback !block">{{ props.errMessage }}</span>
    </div>
</template>

<script setup>
    import { ref } from "vue";

    const props = defineProps({ label: String, errMessage: String });
    const model = defineModel();
    const isVisiblePass = ref(false);
</script>
