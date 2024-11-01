import axios from "axios";
import Swal from "sweetalert2";

window.axios = axios;
window.Swal = Swal;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.notify = ({
    title,
    message,
    icon,
    position = "center",
    timer = 2000,
}) => {
    Swal.mixin({
        position: position,
        showConfirmButton: false,
        timer: timer,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
        customClass: {
            popup: "bg-gray-300 text-gray-800 dark:text-gray-300 dark:!bg-gray-800",
        },
    }).fire({
        title: title,
        text: message,
        icon: icon,
    });
};

window.confirm = ({ title, message }) => {
    return window.Swal.fire({
        title: title,
        text: message,
        showCancelButton: true,
        customClass: {
            popup: "dark:bg-gray-800 bg-gray-300 text-gray-800 dark:text-gray-300",
        },
    });
};
