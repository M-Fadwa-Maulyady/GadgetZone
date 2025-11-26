<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">

                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="data:image/svg+xml;utf8,
                            <svg xmlns='http://www.w3.org/2000/svg' width='130' height='36' viewBox='0 0 130 36'>
                                <text x='0' y='22' font-family='Verdana' font-size='20' fill='%23006ff0'>
                                    GadgetZone
                                </text>
                            </svg>" 
                        alt="logo">
                    </span>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
                    </span>
                </a>

            </div>
        </div>

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <!-- RIGHT SIDE (SEARCH + LOGOUT) -->
        <div class="d-flex align-items-center">

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" 
                        class="btn header-item toggle-search noti-icon waves-effect" 
                        data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <!-- LOGOUT PROPER -->
            <form action="{{ route('logout') }}" method="POST" style="margin-left: 10px;">
                @csrf
                <button type="submit" 
                        class="btn header-item text-danger"
                        style="display: flex; align-items: center;">
                    <i class="mdi mdi-power font-size-16 align-middle me-2 text-danger"></i>
                    Logout
                </button>
            </form>

        </div>
    </div>
</header>
