export function formatToIdr(value) {
    if (!value) return "Rp0";
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(value);
}

export function goBack() {
    window.history.length > 1 ? window.history.back() : router.visit("/");
}
