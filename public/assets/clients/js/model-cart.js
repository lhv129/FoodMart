document.addEventListener("DOMContentLoaded", function () {
    const offcanvasElement = document.getElementById("offcanvasRight");
    const offcanvas = new bootstrap.Offcanvas(offcanvasElement); // Sử dụng backdrop mặc định (true)

    const offcanvasState = localStorage.getItem("offcanvasState");
    if (offcanvasState === "open") {
        offcanvas.show();
    }

    offcanvasElement.addEventListener("shown.bs.offcanvas", function () {
        localStorage.setItem("offcanvasState", "open");
    });

    offcanvasElement.addEventListener("hidden.bs.offcanvas", function () {
        localStorage.removeItem("offcanvasState");
    });

    const openOffcanvasButton = document.getElementById("openOffcanvasButton");
    if (openOffcanvasButton) {
        openOffcanvasButton.addEventListener("click", function () {
            offcanvas.show();
        });
    }
});