import { usePage } from "@inertiajs/vue3";

export const useActiveLink = () => {
    const page = usePage();

    function isActive(path: string) {
        if (page.url.startsWith(path)) {
            return "active";
        }
    }

    return { isActive };
};
