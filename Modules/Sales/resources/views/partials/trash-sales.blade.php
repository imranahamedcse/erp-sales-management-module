<!-- resources/views/sales/partials/trash-sales.blade.php -->
<div class="overflow-x-auto mt-4">
    <table class="table table-zebra">
        <thead>
            <tr>
                <th>Invoice No</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Deleted On</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td>{{ $sale->invoice_number }}</td>
                    <td>{{ $sale->customer->name ?? 'Deleted Customer' }}</td>
                    <td>{{ $sale->sale_date }}</td>
                    <td>{{ $sale->deleted_at->format('Y-m-d H:i') }}</td>
                    <td>${{ number_format($sale->total_amount, 2) }}</td>
                    <td>
                        <div class="flex gap-1">
                            <form action="{{ route('trash.restore', ['type' => 'sales', 'id' => $sale->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-success">
                                    <i class="fas fa-undo mr-1"></i> Restore
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No trashed sales found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($sales->hasPages())
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
@endif
