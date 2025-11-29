<x-layoutUser>

    {{-- ===========================
         ALERT SUCCESS
    ============================ --}}
    @if(session('success'))
    <div class="alert alert-success fade-up"
        style="background:#D4EDDA; padding:12px; border-radius:8px; margin-bottom:20px; color:#155724;">
        {{ session('success') }}
    </div>
    @endif


    {{-- ===========================
         HERO CONTACT (BIRU)
    ============================ --}}
    <section class="contact-hero fade-up">
        <h1>📬 Contact Us</h1>
        <p>Kami siap membantu Anda! Jangan ragu menghubungi tim GadgetZone untuk pertanyaan atau dukungan.</p>
    </section>



    {{-- ===========================
         CONTACT FORM + NEWSLETTER
    ============================ --}}
    <section class="contact-container fade-up">

        {{-- FORM --}}
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

                <button type="submit" class="btn-send">Kirim Pesan</button>
            </form>
        </div>


        {{-- NEWSLETTER --}}
        <div class="newsletter-box">
            <h3>🔥 Jangan Lewatkan Promo & Rilis Produk Terbaru!</h3>
            <p>Bergabunglah untuk mendapatkan diskon besar, penawaran terbatas, dan info gadget terbaru lebih cepat!</p>
        </div>

    </section>



    {{-- ===========================
         CONTACT INFO
    ============================ --}}
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



    {{-- ===========================
         MAP
    ============================ --}}
    <section class="map fade-up">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9855653313116!2d95.36585902435456!3d5.569150783518623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304037b98ba13e41%3A0x93d7ebf4986961a9!2sFMIPA%20USK!5e0!3m2!1sid!2sid!4v1760449449386!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen loading="lazy">
        </iframe>
    </section>



    {{-- ===========================
         CSS FULL PAGE
    ============================ --}}
    <style>

        /* =============================
           HERO CONTACT — BIRU GRADIENT
        ============================== */
        .contact-hero {
            text-align: center;
            padding: 70px 20px 40px;
            background: linear-gradient(135deg, #0099ff, #00c3ff);
            color: white;
        }

        .contact-hero h1 {
            font-size: 32px;
            font-weight: 800;
        }

        .contact-hero p {
            margin-top: 8px;
            font-size: 15px;
            opacity: .95;
        }


        /* =============================
           CONTACT FORM + NEWSLETTER
        ============================== */
        .contact-container {
            max-width: 1100px;
            margin: 30px auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            padding: 0 20px;
        }

        .contact-form {
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-row input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
            background: #f8f9fc;
        }

        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            resize: none;
            background: #f8f9fc;
            border: 1px solid #ddd;
            margin-top: 10px;
        }

        .btn-send {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-send:hover {
            background: #005ad1;
        }


        /* =============================
           NEWSLETTER BOX
        ============================== */
        .newsletter-box {
            background: linear-gradient(135deg, #0099ff, #0077ff);
            padding: 25px 30px;
            border-radius: 18px;
            color: white;
            box-shadow: 0px 8px 18px rgba(0, 0, 0, 0.15);
        }

        .newsletter-box h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }


        /* =============================
           CONTACT INFO
        ============================== */
        .contact-info {
            max-width: 1100px;
            margin: 40px auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 0 20px;
        }

        .info-card {
            background: #fff;
            padding: 20px;
            border-radius: 14px;
            text-align: center;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        }


        /* =============================
           MAP
        ============================== */
        .map {
            max-width: 1100px;
            margin: 30px auto 50px;
            padding: 0 20px;
        }

        .map iframe {
            width: 100%;
            height: 380px;
            border-radius: 14px;
        }


        /* =============================
           RESPONSIVE
        ============================== */
        @media (max-width: 768px) {
            .contact-container {
                grid-template-columns: 1fr;
            }
            .contact-info {
                grid-template-columns: 1fr;
            }
        }

    </style>

</x-layoutUser>
