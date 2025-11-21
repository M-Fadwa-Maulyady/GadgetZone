// Ganti gambar utama saat thumbnail diklik
function changeImage(element) {
  const mainImage = document.getElementById("main-image");
  const thumbnails = document.querySelectorAll(".thumbnail");

  thumbnails.forEach(thumb => thumb.classList.remove("active"));
  element.classList.add("active");

  mainImage.src = element.src;
}

// Highlight warna yang dipilih
document.querySelectorAll('.color').forEach(color => {
  color.addEventListener('click', function() {
    document.querySelectorAll('.color').forEach(c => c.classList.remove('active'));
    this.classList.add('active');
  });
});

// Highlight ukuran yang dipilih
document.querySelectorAll('.size').forEach(size => {
  size.addEventListener('click', function() {
    document.querySelectorAll('.size').forEach(s => s.classList.remove('active'));
    this.classList.add('active');
  });
});
