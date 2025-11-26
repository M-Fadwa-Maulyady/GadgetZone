<x-layoutUser>
    <style>.newsletter-box {
    background: linear-gradient(135deg, #0099ff, #0077ff);
    padding: 25px 30px;
    border-radius: 18px;
    color: white;
    box-shadow: 0px 8px 18px rgba(0, 0, 0, 0.15);
    max-width: 650px;
    margin: 0 auto;
}

.newsletter-box h3 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.newsletter-box p {
    font-size: 15px;
    line-height: 1.5;
    margin-top: 0;
    opacity: 0.95;
}

@media (max-width: 576px) {
    .newsletter-box {
        padding: 20px;
        border-radius: 14px;
    }

    .newsletter-box h3 {
        font-size: 18px;
    }

    .newsletter-box p {
        font-size: 14px;
    }
}
</style>
    <link rel="stylesheet" href="{{ asset('tema/contact.css') }}">
    @if(session('success'))
<div class="alert alert-success fade-up"
     style="background:#D4EDDA; padding:12px; border-radius:8px; margin-bottom:20px; color:#155724;">
    {{ session('success') }}
</div>
@endif

    <section class="contact-hero fade-up">
    <h1>📬 Contact Us</h1>
    <p>Kami siap membantu Anda! Jangan ragu untuk menghubungi tim GadgetZone untuk pertanyaan atau dukungan.</p>
  </section>

  <!-- Contact Section -->
  <section class="contact-container fade-up">
    <div class="contact-form">
      <form action="{{ route('contact.send') }}" method="POST">
    @csrf

    <div class="form-row">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-row">
        <input type="text" name="telepon" placeholder="Nomor Telepon">
        <input type="text" name="subjek" placeholder="Subjek" required>
    </div>

    <textarea name="pesan" placeholder="Pesan Anda..." rows="5" required></textarea>

    <button type="submit" class="btn">Kirim Pesan</button>
</form>

    </div>

    <div class="newsletter-box">
      <h3>🔥 Jangan Lewatkan Promo & Rilis Produk Terbaru!</h3>
      <p>Dengan bergabung ke newsletter GadgetZone, kamu akan menerima pemberitahuan tentang diskon besar, penawaran terbatas, hingga rilis gadget generasi terbaru sebelum orang lain mengetahuinya. Ayo gabung dan tetap update!</p>
    </div>  
  </section>

  <!-- Info Section -->
  <section class="contact-info fade-up">
    <div class="info-card">
      <h4>📞 Telepon</h4>
      <p>(+62) 812-3456-7890</p>
    </div>
    <div class="info-card">
      <h4>📧 Email</h4>
      <p>support@GadgetZone.id</p>
    </div>
    <div class="info-card">
      <h4>📍 Lokasi</h4>
      <p>Jl. Cawe Cawe No. 123, Banda Aceh, Indonesia</p>
    </div>
  </section>

  <!-- Map -->
  <section class="map fade-up">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9855653313116!2d95.36585902435456!3d5.569150783518623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304037b98ba13e41%3A0x93d7ebf4986961a9!2sFMIPA%20USK!5e0!3m2!1sid!2sid!4v1760449449386!5m2!1sid!2sid"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>

  </section>
</x-layoutUser>