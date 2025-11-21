const products = [
  { name: "Smart Speaker", price: "Rp 1.200.000", stars: 5, img: "img/product1.jpg", type: "latest" },
  { name: "Wireless Headphone", price: "Rp 950.000", stars: 4, img: "img/product4.jpg", type: "bestseller" },
  { name: "Smart Watch", price: "Rp 1.800.000", stars: 5, img: "img/product7.jpg", type: "featured" },
  { name: "Mini Camera", price: "Rp 1.050.000", stars: 4, img: "img/product2.jpg", type: "latest" },
  { name: "Bluetooth Speaker", price: "Rp 870.000", stars: 5, img: "img/product5.jpg", type: "bestseller" },
  { name: "VR Headset", price: "Rp 2.500.000", stars: 5, img: "img/product8.jpg", type: "featured" },
  { name: "Tablet Pro 10”", price: "Rp 3.200.000", stars: 5, img: "img/product3.jpg", type: "latest" },
  { name: "Gaming Mouse RGB", price: "Rp 350.000", stars: 4, img: "img/product6.jpg", type: "bestseller" }
];

const grid = document.getElementById("productGrid");
const filterBtns = document.querySelectorAll(".filters button");

function renderProducts(filter = "latest") {
  grid.innerHTML = "";
  const filtered = products.filter(p => p.type === filter);
  filtered.forEach(p => {
    const card = document.createElement("div");
    card.classList.add("product-card");
    card.innerHTML = `
      <img src="${p.img}" alt="${p.name}">
      <h3>${p.name}</h3>
      <p class="price">${p.price}</p>
      <div class="stars">${"★".repeat(p.stars)}${"☆".repeat(5 - p.stars)}</div>
      <button class="btn-cart">Add to Cart</button>
    `;
    grid.appendChild(card);
  });
}

filterBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    filterBtns.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
    renderProducts(btn.dataset.filter);
  });
});

renderProducts("latest");
