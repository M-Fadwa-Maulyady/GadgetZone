{{-- ================= NAVBAR USER ================= --}}
<header class="site-header">

    {{-- ================= TOP BAR ================= --}}
    <div class="topbar">

        {{-- Logo kiri --}}
        <div class="brand">
            <img src="data:image/svg+xml;utf8,
            <svg xmlns='http://www.w3.org/2000/svg' width='130' height='36'>
                <text x='0' y='22' font-family='Verdana' font-size='20' fill='%23006ff0'>
                    GadgetZone
                </text>
            </svg>" alt="logo">
        </div>

        {{-- Search + Cart + Logout → kanan --}}
        <div class="header-actions" style="margin-left:auto; display:flex; align-items:center; gap:10px;">
            
            <div class="search-wrap">
                <input type="search" placeholder="Enter keyword..." id="searchInput">
                <button class="btn">Search</button>
            </div>

            <button class="icon-btn">🛒 <span class="cart-badge">3</span></button>

            <a href="#" class="btn btn-logout" id="logoutBtn">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>

    </div>

    {{-- ================= NAV MENU (TENGAH) ================= --}}
    <nav class="main-nav" 
         style="display:flex; justify-content:center; gap:30px; padding:15px 0;">

        <a href="{{ route('user.landingLogin') }}"
            class="{{ request()->routeIs('user.landingLogin') ? 'active' : '' }}">
            Home
        </a>

        <a href="#">Collections</a>

        {{-- <a href="{{ route('productUser') }}"
            class="{{ request()->routeIs('productUser') ? 'active' : '' }}">
            Products
        </a> --}}

        <a href="#">Blog</a>
        <a href="#">Contact</a>

    </nav>

</header>

{{-- ================= CONTENT ================= --}}
<main>
    {{ $slot }}
</main>

{{-- ================= LOGOUT SCRIPT ================= --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('logoutBtn').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('logout-form').submit();
        });
    });
</script>
