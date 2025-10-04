import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import { ROUTE_API } from "../../Routes/Api";

export const useQris = () => {
    const isSubmitting = ref(false);

    const files = ref(null);

    const update = () => {
        isSubmitting.value = true;
        router.post(
            ROUTE_API.admin.payment_methods.update_qris,
            {
                qris_image: files.value[0].file,
            },
            {
                forceFormData: true,
                onFinish: () => (isSubmitting.value = false),
            },
        );
    };

    return {
        isSubmitting,
        files,
        update,
    };
};
