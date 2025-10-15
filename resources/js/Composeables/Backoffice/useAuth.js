import { usePage } from "@inertiajs/vue3";

export function useAuth() {
    function isSuperadmin() {
        const page = usePage();
        return page.props.auth?.user?.role === "superadmin";
    }

    function hideIfNotSuperadmin() {
        return isSuperadmin() ? "" : "hidden";
    }

    return {
        isSuperadmin,
        hideIfNotSuperadmin,
    };
}
