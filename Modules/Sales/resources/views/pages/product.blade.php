@extends('sales::layouts.master')

@section('content')
    <!-- Products Page -->
    <div id="products-page" class="page-content hidden">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h2 class="card-title">Products</h2>
                    <button class="btn btn-primary mt-2 md:mt-0">
                        <i class="fas fa-plus mr-1"></i> Add Product
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="avatar">
                                            <div class="w-10 rounded">
                                                <img src="https://placehold.co/40x40" alt="Product">
                                            </div>
                                        </div>
                                        <span>Laptop</span>
                                    </div>
                                </td>
                                <td>Electronics</td>
                                <td>$1,200.00</td>
                                <td>15</td>
                                <td><span class="badge badge-success">In Stock</span></td>
                                <td>
                                    <div class="flex gap-1">
                                        <button class="btn btn-xs btn-info">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-xs btn-error">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="avatar">
                                            <div class="w-10 rounded">
                                                <img src="https://placehold.co/40x40" alt="Product">
                                            </div>
                                        </div>
                                        <span>Mouse</span>
                                    </div>
                                </td>
                                <td>Accessories</td>
                                <td>$35.00</td>
                                <td>42</td>
                                <td><span class="badge badge-success">In Stock</span></td>
                                <td>
                                    <div class="flex gap-1">
                                        <button class="btn btn-xs btn-info">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-xs btn-error">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="avatar">
                                            <div class="w-10 rounded">
                                                <img src="https://placehold.co/40x40" alt="Product">
                                            </div>
                                        </div>
                                        <span>Monitor</span>
                                    </div>
                                </td>
                                <td>Electronics</td>
                                <td>$250.00</td>
                                <td>8</td>
                                <td><span class="badge badge-warning">Low Stock</span></td>
                                <td>
                                    <div class="flex gap-1">
                                        <button class="btn btn-xs btn-info">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-xs btn-error">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between items-center mt-4">
                    <div>
                        <span class="text-sm">Showing 1 to 3 of 3 entries</span>
                    </div>
                    <div class="join">
                        <button class="join-item btn btn-sm btn-disabled">«</button>
                        <button class="join-item btn btn-sm btn-active">1</button>
                        <button class="join-item btn btn-sm">2</button>
                        <button class="join-item btn btn-sm">»</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
