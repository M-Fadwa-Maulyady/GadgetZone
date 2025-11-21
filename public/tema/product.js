// Scroll ke produk saat klik tombol "Shop Now"
function scrollToProducts() {
  document.getElementById("produk-section").scrollIntoView({ behavior: "smooth" });
}

// Efek muncul saat scroll
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) entry.target.classList.add("show");
  });
});
document.querySelectorAll(".fade-up, .fade-in").forEach(el => observer.observe(el));

// Data produk
const products = [
  { name: "Smart Speaker", price: "Rp 1.200.000", stars: 5, img: "img/product1.jpg", type: "audio" },
  { name: "Wireless Headphone", price: "Rp 950.000", stars: 4, img: "img/product4.jpg", type: "audio" },
  { name: "Smart Watch", price: "Rp 1.800.000", stars: 5, img: "img/product7.jpg", type: "smartwatch" },
  { name: "Mini Camera", price: "Rp 1.050.000", stars: 4, img: "img/product2.jpg", type: "camera" },
  { name: "Bluetooth Speaker", price: "Rp 870.000", stars: 5, img: "img/product5.jpg", type: "audio" },
  { name: "VR Headset", price: "Rp 2.500.000", stars: 5, img: "img/product8.jpg", type: "game_console" },
  { name: "Tablet Pro 10”", price: "Rp 3.200.000", stars: 5, img: "img/product3.jpg", type: "tablet" },
  { name: "Gaming Mouse RGB", price: "Rp 350.000", stars: 4, img: "img/product6.jpg", type: "game_console" }
];

// Render produk
const grid = document.getElementById("productGrid");
function renderProducts(filter = "all") {
  grid.innerHTML = "";
  const filtered = filter === "all" ? products : products.filter(p => p.type === filter);

  filtered.forEach(p => {
    const card = document.createElement("div");
    card.className = "product-card";
    card.innerHTML = `
      <img src="${p.img}" alt="${p.name}">
      <h4>${p.name}</h4>
      <p>${p.price}</p>
      <button class="btn-cart" onclick="beliSekarang('${p.name}', '${p.price}', '${p.img}')">Beli Sekarang</button>
    `;
    grid.appendChild(card);
  });
}
renderProducts();

// Filter tombol kategori
document.querySelectorAll(".filters button").forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelector(".filters button.active").classList.remove("active");
    btn.classList.add("active");
    renderProducts(btn.dataset.filter);
  });
});

// Simpan data produk yang dipilih
function beliSekarang(nama, harga, gambar) {
  localStorage.setItem("produk", JSON.stringify({ nama, harga, gambar }));
  window.location.href = "product-detail.html";
}
