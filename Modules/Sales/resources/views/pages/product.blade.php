@extends('sales::layouts.master')

@section('content')
    <!-- Products Page -->
    <div id="products-page" class="page-content">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h2 class="card-title">Products</h2>
                    <a href="{{ route('products.create') }}" class="btn btn-primary mt-2 md:mt-0">
                        <i class="fas fa-plus mr-1"></i> Add Product
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
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
                                                    @if($product->image)
                                                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($product->name) }}&background=random" alt="{{ $product->name }}">
                                                    @endif
                                                </div>
                                            </div>
                                            <span>{{ $product->name }}</span>
                                        </div>
                                    </td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->stock_quantity }}</td>
                                    <td>
                                        @if($product->stock_quantity > 10)
                                            <span class="badge badge-success">In Stock</span>
                                        @elseif($product->stock_quantity > 0)
                                            <span class="badge badge-warning">Low Stock</span>
                                        @else
                                            <span class="badge badge-error">Out of Stock</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex gap-1">
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-xs btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-xs btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('products.delete', $product->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-error" onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between items-center mt-4">
                    <div>
                        <span class="text-sm">
                            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
                        </span>
                    </div>
                    <div class="join">
                        {{ $products->links('sales::partials.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
