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



                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        

                        <li>
                            <a href="index.html" class="waves-effect">
                                <i class="dripicons-home"></i><span class="badge rounded-pill bg-info float-end"></span>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="ecommerce-add-product.html" class="waves-effect">
                                <i class="fa-solid fa-basket-shopping"></i></i><span class="badge rounded-pill bg-info float-end"></span>
                                <span>Product</span>
                            </a>
                        </li>

                         <li>
                            <a href="{{ route('dataCustomer') }}" class="waves-effect {{ request()->routeIs('dataCustomer') ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i><span class="badge rounded-pill bg-info float-end"></span>
                                <span>Customers</span>
                            </a>
                        </li>

                        <li>
                            <a href="ecommerce-orders.html" class="waves-effect">
                                <i class="fa-solid fa-truck-fast"></i><span class="badge rounded-pill bg-info float-end">3</span>
                                <span>Orders</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="ecommerce-checkout.html" class="waves-effect">
                                <i class="fa-solid fa-cart-shopping"></i><span class="badge rounded-pill bg-info float-end">3</span>
                                <span>Checkout</span>
                            </a>
                        </li>

                        <li>
                            <a href="ecommerce-shops.html" class="waves-effect">
                                <i class="fa-solid fa-book"></i><span class="badge rounded-pill bg-info float-end"></span>
                                <span>Laporan</span>
                            </a>
                        </li>         
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>