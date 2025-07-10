<div class="overflow-x-auto">
    <table class="table table-zebra">
        <thead>
            <tr>
                <th>Invoice No</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Items</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td>{{ $sale->invoice_number }}</td>
                    <td>{{ $sale->customer->name }}</td>
                    <td>{{ $sale->sale_date }}</td>
                    <td>{{ $sale->items->count() }}</td>
                    <td>${{ number_format($sale->total_amount, 2) }}</td>
                    <td>
                        @if ($sale->status == 'completed')
                            <span class="badge badge-success">Completed</span>
                        @elseif($sale->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @else
                            <span class="badge badge-error">Cancelled</span>
                        @endif
                    </td>
                    <td>
                        <div class="flex gap-1">
                            <form action="{{ route('sales.delete', $sale->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-error"
                                    onclick="return confirm('Are you sure you want to delete this sale?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No sales found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="flex justify-between items-center mt-4">
    <div>
        <span class="text-sm">
            Showing {{ $sales->firstItem() }} to {{ $sales->lastItem() }} of {{ $sales->total() }} entries
        </span>
    </div>
    <div class="join">
        {{ $sales->links('sales::partials.pagination') }}
    </div>
</div>
