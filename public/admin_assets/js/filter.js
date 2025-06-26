document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".sub-category .tab");
    const cards = document.querySelectorAll(".produk-card");

    tabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            // Hapus kelas 'active' dari semua tab
            tabs.forEach((t) => t.classList.remove("active"));
            // Tambahkan kelas 'active' ke tab yang diklik
            tab.classList.add("active");

            const category = tab.textContent.toLowerCase();

            cards.forEach((card) => {
                const title = card
                    .querySelector("h3")
                    .textContent.toLowerCase();

                if (category === "semua" || title.includes(category)) {
                    card.style.display = "flex"; // pastikan tetap fleksibel
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
});
