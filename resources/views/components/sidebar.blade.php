<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">Fadwa Bkacor</h5>
                    <span class="font-size-13 text-white-50">Administrator</span>
                </div>
            </div>
        </div>

        <!-- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="ecommerce-add-product.html" class="waves-effect">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <span>Product</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dataCustomer') }}"
                       class="waves-effect {{ request()->routeIs('dataCustomer') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>

                <!-- ORDER FINAL ROUTE -->
                <li>
                    <a href="{{ route('admin.orders') }}"
                       class="waves-effect {{ request()->routeIs('admin.orders') ? 'active' : '' }}">
                        <i class="fa-solid fa-truck-fast"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <!-- CHECKOUT FINAL ROUTE -->
                <li>
                    <a href="{{ route('admin.checkout') }}"
                       class="waves-effect {{ request()->routeIs('admin.checkout') ? 'active' : '' }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Checkout</span>
                    </a>
                </li>

                <li>
                    <a href="ecommerce-shops.html" class="waves-effect">
                        <i class="fa-solid fa-book"></i>
                        <span>Laporan</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
