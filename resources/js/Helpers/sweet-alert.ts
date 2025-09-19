import Swal from "sweetalert2";

export const Alert = {
    success: (text: string) =>
        Swal.fire({
            icon: "success",
            text: text ?? "Sukses",
        }),
    error: (text: string) =>
        Swal.fire({
            icon: "error",
            text: text ?? "Error",
        }),
};
