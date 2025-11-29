<x-layoutUser>

       <!-- hero + right promos -->
    <section class="hero-section">
      <div class="hero-left">
        <div class="slider" id="mainSlider">
          <div class="slide" style="background-image:url('tema/img/home1.jpeg');">
            <div class="slide-content">
              <small>GAMING GEAR</small>
              <h1>GAME CONTROLLER</h1>
              <p>Controller type: Wireless controller</p>
              <a class="btn btn-primary" href="#">Shop Now</a>
            </div>
          </div>
          <div class="slide" style="background-image:url('tema/img/home2.jpeg');">
            <div class="slide-content">
              <small>NEW ARRIVAL</small>
              <h1>PLAY STATION 5</h1>
              <a class="btn btn-primary" href="#">Shop Now</a>
            </div>
          </div>
          <div class="slider-nav">
            <button id="prevSlide">‹</button>
            <div class="dots" id="sliderDots"></div>
            <button id="nextSlide">›</button>
          </div>
        </div>
      </div>

      <div class="hero-right">
        <a class="promo-card" href="#" style="background-image:linear-gradient(120deg,#8b5cf6,#ec4899);">
          <img src="{{ asset('tema/img/bambo_speaker.png') }}" alt="">
          <div class="promo-text">
            <small>NEW ARRIVALS</small>
            <h3>BAMBOBUDS</h3>
            <p>Shop Now →</p>
          </div>
        </a>

        <a class="promo-card" href="#" style="background-image:linear-gradient(120deg,#06b6d4,#8b5cf6);">
          <img src="{{ asset('tema/img/homepod.png') }}" alt="">    
          <div class="promo-text">
            <small>NEW ARRIVALS</small>
            <h3>HOMEPOD PRO</h3>
            <p>Shop Now →</p>
          </div>
        </a>
      </div>
    </section>

    <!-- categories carousel -->
    <section class="category-strip">
    <button class="cat-arrow" id="catPrev">‹</button>

    <div class="cat-track" id="catTrack">

        @foreach($categories as $cat)
            <div class="cat-item">
                <img 
                    src="{{ $cat->icon 
                        ? asset('uploads/categories/' . $cat->icon) 
                        : asset('img/default-category.png') 
                    }}"
                    alt="{{ $cat->nama }}">
                <span>{{ $cat->nama }}</span>
            </div>
        @endforeach

    </div>

    <button class="cat-arrow" id="catNext">›</button>
</section>


    <!-- features -->
    <section class="features">
      <div class="feature">
        <svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12 2L2 7v7c0 5 4 9 10 9s10-4 10-9V7l-10-5z"/></svg>
        <p><strong>Gratis Ongkir Seluruh Indonesia</strong>
          <br><small>Untuk Pesanan di atas Rp200.000.000</small></p>
      </div>
      <div class="feature">
        <svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12 1L3 5v6c0 5 4 9 9 9s9-4 9-9V5l-9-4z"/></svg>
        <p><strong>Pembayaran Aman</strong>
          <br><small>Melalui Visa, BSI, DANA</small></p>
      </div>
      <div class="feature">
        <svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12 2C6 2 2 6 2 12s4 10 10 10 10-4 10-10S18 2 12 2z"/></svg>
        <p><strong>Garansi Resmi 1 Jam</strong>
          <br><small>Terhadap cacat produksi</small></p>
      </div>
      <div class="feature">
        <svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12 22c5 0 9-4 9-9s-4-9-9-9-9 4-9 9 4 9 9 9z"/></svg>
        <p><strong>Layanan Pelanggan 24 Jam</strong>
          <br><small>Hubungi kami kapan saja</small></p>
      </div>
    </section>

    <!-- featured product trio -->
    

    <!-- top smartphone trends -->
    <!-- ======================= -->
<!-- Top Smartphone Trends -->
<!-- ======================= -->
<section class="grid-products" style="margin-top: 60px;">
  <h3 class="section-title" style="text-align:center; margin-bottom:25px;">
      Top Smartphone Trends
  </h3>

  <div class="card-grid">
      @foreach ($smartphones as $hp)
      <div class="card" style="padding-bottom:15px;">

    <a href="{{ route('user.produk_detail', $hp->id) }}">
        <img src="{{ asset('tema/img/produk/' . $hp->gambar) }}"
             alt="{{ $hp->nama }}"
             style="object-fit:cover; height:230px; width:100%; border-radius:8px;">
    </a>

    <div class="card-body" style="padding-top:15px;">
        <h5 style="font-size:16px; font-weight:600; margin-bottom:5px;">
            {{ $hp->nama }}
        </h5>

        <p class="price" style="color:#00AEEF; font-weight:700;">
            Rp {{ number_format($hp->harga, 0, ',', '.') }}
        </p>

        <form action="{{ route('cart.add', $hp->id) }}" method="POST">
            @csrf
            <button class="btn" style="width:100%; margin-top:8px;">Masukkan Keranjang</button>
        </form>
    </div>

</div>

      @endforeach
  </div>
</section>


<!-- ======================= -->
<!-- Top Drone Trends -->
<!-- ======================= -->
<section class="grid-products" style="margin-top:70px;">
  <h3 class="section-title" style="text-align:center; margin-bottom:25px;">
      Top Drone Trends
  </h3>

  <div class="card-grid">
      @foreach ($drones as $dr)
      <div class="card" style="padding-bottom:15px;">

    <a href="{{ route('user.produk_detail', $dr->id) }}">
        <img src="{{ asset('tema/img/produk/' . $dr->gambar) }}"
             alt="{{ $dr->nama }}"
             style="object-fit:cover; height:230px; width:100%; border-radius:8px;">
    </a>

    <div class="card-body" style="padding-top:15px;">
        <h5 style="font-size:16px; font-weight:600; margin-bottom:5px;">
            {{ $dr->nama }}
        </h5>

        <p class="price" style="color:#00AEEF; font-weight:700;">
            Rp {{ number_format($dr->harga, 0, ',', '.') }}
        </p>

        <form action="{{ route('cart.add', $dr->id) }}" method="POST">
            @csrf
            <button class="btn" style="width:100%; margin-top:8px;">Masukkan Keranjang</button>
        </form>
    </div>

</div>

      @endforeach
  </div>
</section>



</x-layoutUser>