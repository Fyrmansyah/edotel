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

export function normalizePhone(raw) {
    if (!raw && raw !== 0) return null;
    let s = String(raw).trim();

    // Hapus semua kecuali digit dan plus (sebelumnya)
    s = s.replace(/[^\d+]/g, "");

    // Hilangkan leading 00 (kadang dipakai sebagai +)
    s = s.replace(/^00+/, "");

    // Hilangkan plus jika ada
    if (s.startsWith("+")) s = s.slice(1);

    // Sekarang hanya digit
    s = s.replace(/[^\d]/g, "");

    if (!s) return null;

    // Normalisasi ke format 62...
    if (s.startsWith("0")) {
        // 08882123 -> 628882123
        s = "62" + s.slice(1);
    } else if (s.startsWith("8")) {
        // 8882123 -> 628882123 (orang kadang kirim tanpa 0)
        s = "62" + s;
    } else if (!s.startsWith("62")) {
        // Kalau bukan diawali 62, asumsikan Indonesia dan tambahkan 62
        s = "62" + s;
    }

    return s;
}
