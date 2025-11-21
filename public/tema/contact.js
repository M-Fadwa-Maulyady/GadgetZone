// Efek animasi muncul saat scroll
window.addEventListener("scroll", () => {
  const elements = document.querySelectorAll(".fade-up");
  elements.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 50) {
      el.classList.add("visible");
    }
  });
});

// Pesan konfirmasi kirim form
document.querySelector("form")?.addEventListener("submit", (e) => {
  e.preventDefault();
  alert("Terima kasih! Pesan kamu sudah dikirim ke tim eCommax 💙");
});
