// Efek smooth fade saat scroll
window.addEventListener("scroll", () => {
  const elements = document.querySelectorAll(".fade-up");
  elements.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 50) {
      el.classList.add("visible");
    }
  });
});
