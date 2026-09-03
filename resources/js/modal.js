document.addEventListener("DOMContentLoaded", () => {
    console.log("Modal script loaded");
    // Buka modal
    document.querySelectorAll("[data-modal-open]").forEach((button) => {
        button.addEventListener("click", () => {
            const modalId = button.dataset.modalOpen;
            const modal = document.getElementById(modalId);
            if (!modal) return;

            modal.classList.remove("hidden");
            modal.classList.add("flex");
        });
    });

    // Tutup modal
    document.querySelectorAll("[data-modal-close]").forEach((button) => {
        button.addEventListener("click", () => {
            const modalId = button.dataset.modalClose;
            const modal = document.getElementById(modalId);

            if (!modal) return;

            modal.classList.remove("flex");
            modal.classList.add("hidden");
        });
    });


});
