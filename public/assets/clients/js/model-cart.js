document.addEventListener("DOMContentLoaded", function () {
    const offcanvasElement = document.getElementById("offcanvasRight");
    const offcanvas = new bootstrap.Offcanvas(offcanvasElement);

    // Hàm để lấy tham số URL
    function getUrlParameter(name) {
        name = name.replace(/[\[\]]/g, "\\$&");
        const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(window.location.href);
        if (!results) return null;
        if (!results[2]) return "";
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    // Kiểm tra tham số URL khi tải trang
    if (getUrlParameter("offcanvas") === "open") {
        offcanvas.show();
    }

    // Hàm để thêm tham số URL
    function addUrlParameter(name, value) {
        const url = new URL(window.location.href);
        url.searchParams.set(name, value);
        window.history.replaceState({}, "", url); // Thay đổi URL mà không tải lại trang
    }

    // Hàm để xóa tham số URL
    function removeUrlParameter(name) {
        const url = new URL(window.location.href);
        url.searchParams.delete(name);
        window.history.replaceState({}, "", url); // Thay đổi URL mà không tải lại trang
    }

    // Sự kiện khi offcanvas được hiển thị
    offcanvasElement.addEventListener("shown.bs.offcanvas", function () {
        addUrlParameter("offcanvas", "open");
    });

    // Sự kiện khi offcanvas được ẩn
    offcanvasElement.addEventListener("hidden.bs.offcanvas", function () {
        removeUrlParameter("offcanvas");
    });

    const openOffcanvasButton = document.getElementById("openOffcanvasButton");
    if (openOffcanvasButton) {
        openOffcanvasButton.addEventListener("click", function () {
            offcanvas.show();
        });
    }
});
