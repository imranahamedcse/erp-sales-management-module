<!-- resources/views/sales/partials/trash-products.blade.php -->
<div class="overflow-x-auto mt-4">
    <table class="table table-zebra">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Deleted On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <div class="flex items-center gap-2">
                            <div class="avatar">
                                <div class="w-10 rounded">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($product->name) }}&background=random"
                                            alt="{{ $product->name }}">
                                    @endif
                                </div>
                            </div>
                            <span>{{ $product->name }}</span>
                        </div>
                    </td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>{{ $product->deleted_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <div class="flex gap-1">
                            <form action="{{ route('trash.restore', ['type' => 'products', 'id' => $product->id]) }}"
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
                    <td colspan="6" class="text-center">No trashed products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($products->hasPages())
    <div class="flex justify-between items-center mt-4">
        <div>
            <span class="text-sm">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }}
                entries
            </span>
        </div>
        <div class="join">
            {{ $products->links('sales::partials.pagination') }}
        </div>
    </div>
@endif
