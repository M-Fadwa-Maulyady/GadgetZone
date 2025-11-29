<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="{{ asset('tema/admin/assets/images/users/avatar-7.jpg') }}" 
                         alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>

                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">{{ auth()->user()->name }}</h5>
                    <span class="font-size-13 text-white-50">
                        {{ auth()->user()->role == 'admin' ? 'Administrator' : 'User' }}
                    </span>
                </div>
            </div>
        </div>


        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                {{-- Dashboard --}}
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="waves-effect {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Customers --}}
                <li>
                    <a href="{{ route('admin.customers.index') }}"
                       class="waves-effect {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>

                {{-- Category --}}
                <li>
                    <a href="{{ route('admin.category.index') }}">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span>Kategori</span>
                    </a>
                </li>


                {{-- Produk --}}
                <li>
                    <a href="{{ route('admin.produk.index') }}"
                       class="waves-effect {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <span>Product</span>
                    </a>
                </li>

                {{-- Orders --}}
                <li>
                    <a href="{{ route('admin.orders') }}"
                       class="waves-effect {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                        <i class="fa-solid fa-truck-fast"></i>
                        <span>Orders</span>
                    </a>
                </li>

                {{-- Blog --}}
                <li>
                    <a href="{{ route('admin.blog.index') }}"
                       class="waves-effect {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-blog"></i>
                        <span>Blog</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
