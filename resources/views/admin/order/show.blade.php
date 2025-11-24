<x-layoutAdmin>

<div class="main-content" style="margin-left: 0; padding-left: 0;">
    <div class="page-content">

        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Order Detail</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">GateZone</a></li>
                                <li class="breadcrumb-item"><a href="#">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Order Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="page-content-wrapper">

                <div class="row">
                    <!-- Order Info -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title mb-3">Order Information</h4>

                                <p><strong>Order ID:</strong><br>
                                    #{{ $order->id }}
                                </p>

                                <p><strong>Billing Name:</strong><br>
                                    {{ $order->billing_name }}
                                </p>

                                <p><strong>Email:</strong><br>
                                    {{ $order->billing_email }}
                                </p>

                                <p><strong>Phone:</strong><br>
                                    {{ $order->billing_phone }}
                                </p>

                                <p><strong>Total Price:</strong><br>
                                    ${{ number_format($order->total_price, 2) }}
                                </p>

                                <hr>

                                <h4 class="header-title mb-3">Payment Status</h4>

                                <form action="{{ url('admin/orders/'.$order->id.'/status') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <select name="payment_status" class="form-select mb-3">
                                        <option value="pending"  {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="paid"     {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="unpaid"   {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="canceled" {{ $order->payment_status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                    </select>

                                    <button class="btn btn-primary w-100">Update Status</button>
                                </form>

                                <br>

                                <a href="{{ url('admin/orders') }}" class="btn btn-secondary w-100">Back to Orders</a>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div>
        </div>

    </div>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © GateZone.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

</x-layoutAdmin>
