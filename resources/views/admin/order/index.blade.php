<x-layoutAdmin>
@foreach ($orders as $order)
    <tr>
        <td>
            <div class="form-check">
                <input type="checkbox" class="form-check-input">
            </div>
        </td>

        <!-- Order ID -->
        <td>
            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-dark fw-bold">
                #{{ $order->id }}
            </a>
        </td>

        <!-- Date -->
        <td>{{ $order->created_at->format('d M, Y') }}</td>

        <!-- Billing Name (pakai user->name karena migration lama tidak punya billing_name) -->
        <td>{{ $order->user->name ?? 'Unknown' }}</td>

        <!-- Total -->
        <td>${{ number_format($order->total_price, 2) }}</td>

        <!-- Payment Status (pakai kolom "status" migration lama) -->
        <td>
            @if($order->status == 'paid')
                <div class="badge badge-soft-success font-size-12">Paid</div>
            @elseif($order->status == 'pending')
                <div class="badge badge-soft-warning font-size-12">Pending</div>
            @elseif($order->status == 'unpaid')
                <div class="badge badge-soft-danger font-size-12">Unpaid</div>
            @else
                <div class="badge badge-soft-secondary font-size-12">
                    {{ ucfirst($order->status) }}
                </div>
            @endif
        </td>

        <!-- Invoice (placeholder) -->
        <td>
            <button class="btn btn-light btn-rounded">
                Invoice <i class="mdi mdi-download ms-2"></i>
            </button>
        </td>

        <!-- Action -->
        <td>
            <a href="{{ route('admin.orders.show', $order->id) }}" class="me-3 text-primary" title="Detail">
                <i class="mdi mdi-eye font-size-18"></i>
            </a>
            <a href="javascript:void(0);" class="text-danger" title="Delete">
                <i class="mdi mdi-trash-can font-size-18"></i>
            </a>
        </td>
    </tr>
@endforeach
</x-layoutAdmin>
