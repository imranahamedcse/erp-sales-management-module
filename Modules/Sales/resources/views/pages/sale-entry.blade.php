@extends('sales::layouts.master')

@section('content')
    <!-- Sales Entry Page -->
    <div class="page-content">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left Column -->
            <div class="flex-1">
                <div class="card bg-base-100 shadow">
                    <div class="card-body">
                        <h2 class="card-title">Sales Entry</h2>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Customer</span>
                            </label>
                            <div class="flex gap-2">
                                <select class="select select-bordered flex-1">
                                    <option disabled selected>Select customer</option>
                                    <option>John Doe</option>
                                    <option>Jane Smith</option>
                                    <option>Acme Corporation</option>
                                </select>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Add Product</span>
                            </label>
                            <div class="flex gap-2">
                                <input type="text" placeholder="Search product..." class="input input-bordered flex-1" />
                                <button class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="sales-items">
                                    <tr>
                                        <td>
                                            <select class="select select-bordered select-sm w-full max-w-xs product-select">
                                                <option disabled selected>Select product</option>
                                                <option data-price="1200">Laptop</option>
                                                <option data-price="350">Mouse</option>
                                                <option data-price="2500">Monitor</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="input input-bordered input-sm w-24 price-input"
                                                value="0" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="input input-bordered input-sm w-20 quantity-input"
                                                value="1" min="1">
                                        </td>
                                        <td>
                                            <div class="flex items-center">
                                                <input type="number"
                                                    class="input input-bordered input-sm w-16 discount-input" value="0"
                                                    min="0" max="100">
                                                <span class="ml-1">%</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="item-total">0.00</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-error btn-xs remove-item">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button id="add-item-btn" class="btn btn-sm btn-ghost mt-2">
                                <i class="fas fa-plus mr-1"></i> Add Item
                            </button>
                        </div>

                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Notes</span>
                            </label>
                            <textarea class="textarea textarea-bordered h-24" placeholder="Sale notes..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="w-full lg:w-80">
                <div class="card bg-base-100 shadow">
                    <div class="card-body">
                        <h2 class="card-title">Order Summary</h2>

                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between">
                                <span>Date:</span>
                                <span class="font-medium" id="sale-date">2023-07-20</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Invoice No:</span>
                                <span class="font-medium">#INV-2023-001</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between">
                                <span>Subtotal:</span>
                                <span class="font-medium" id="subtotal">0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Discount:</span>
                                <span class="font-medium" id="total-discount">0.00</span>
                            </div>
                            <div class="flex justify-between text-lg font-bold">
                                <span>Total:</span>
                                <span class="text-primary" id="grand-total">0.00</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="space-y-2">
                            <button class="btn btn-primary w-full">
                                <i class="fas fa-save mr-2"></i> Complete Sale
                            </button>
                            <button class="btn btn-outline w-full">
                                <i class="fas fa-file-alt mr-2"></i> Save as Draft
                            </button>
                            <button class="btn btn-error btn-outline w-full">
                                <i class="fas fa-times mr-2"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
