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

                        <div id="form-errors" class="alert alert-error mb-4 hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span id="error-message"></span>
                        </div>

                        <form id="sales-form" method="POST">
                            @csrf
                            <div class="flex justify-between items-center gap-4">
                                <div class="form-control mb-4 w-full">
                                    <label class="label">
                                        <span class="label-text">Customer</span>
                                    </label>
                                    <div class="flex gap-2">
                                        <select name="customer_id" id="customer_id" class="select select-bordered flex-1"
                                            required>
                                            <option value="" disabled selected>Select customer</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-control mb-4 w-full">
                                    <label class="label">
                                        <span class="label-text">Add Product</span>
                                    </label>
                                    <div class="flex gap-2">
                                        <select id="product-search" class="select select-bordered flex-1">
                                            <option value="" disabled selected>Select product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                    {{ $product->name }} - ${{ number_format($product->price, 2) }}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" id="add-product-btn" class="btn btn-primary">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
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
                                        <!-- Items will be added dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="label-text">Notes</span>
                                </label>
                                <textarea name="notes" id="notes" class="textarea textarea-bordered h-24" placeholder="Sale notes..."></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="w-full lg:w-80">
                <div class="card bg-base-100 shadow">
                    <div class="card-body">
                        <h2 class="card-title">Order Summary</h2>

                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span>Date:</span>
                                <input type="date" name="sale_date" id="sale_date" class="input input-bordered" required>
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
                            <button type="button" id="submit-sale" class="btn btn-primary w-full">
                                <i class="fas fa-save mr-2"></i> Complete Sale
                            </button>
                            <button type="button" id="cancel-sale" class="btn btn-error btn-outline w-full">
                                <i class="fas fa-times mr-2"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set current date
            const today = new Date().toISOString().split('T')[0];
            $('#sale_date').val(today);
            $('#display-sale-date').text(today);

            // Initialize empty items array
            let items = [];

            // Add product to the list
            $('#add-product-btn').on('click', function() {
                const productSelect = $('#product-search');
                const productId = productSelect.val();
                const productOption = productSelect.find('option:selected');

                if (!productId) {
                    showError('Please select a product');
                    return;
                }

                // Check if product already exists
                if (items.some(item => item.product_id == productId)) {
                    showError('This product is already added');
                    return;
                }

                const productName = productOption.text().split(' - ')[0];
                const price = parseFloat(productOption.data('price'));

                // Add to items array
                items.push({
                    product_id: productId,
                    name: productName,
                    price: price,
                    quantity: 1,
                    discount: 0,
                    total: price
                });

                // Add to table
                addProductToTable(items[items.length - 1]);

                // Clear selection
                productSelect.val('');

                // Update totals
                updateOrderSummary();
            });

            // Add product row to table
            function addProductToTable(item) {
                const row = `
            <tr data-product-id="${item.product_id}">
                <td>${item.name}</td>
                <td>
                    <input type="hidden" name="items[${item.product_id}][product_id]" value="${item.product_id}">
                    <input type="hidden" name="items[${item.product_id}][price]" value="${item.price}">
                    <span>${item.price.toFixed(2)}</span>
                </td>
                <td>
                    <input type="number" name="items[${item.product_id}][quantity]"
                        class="input input-bordered input-sm w-20 quantity-input"
                        value="${item.quantity}" min="1" data-product-id="${item.product_id}">
                </td>
                <td>
                    <div class="flex items-center">
                        <input type="number" name="items[${item.product_id}][discount]"
                            class="input input-bordered input-sm w-16 discount-input"
                            value="${item.discount}" min="0" max="100" data-product-id="${item.product_id}">
                        <span class="ml-1">%</span>
                    </div>
                </td>
                <td>
                    <span class="item-total" data-product-id="${item.product_id}">${item.total.toFixed(2)}</span>
                </td>
                <td>
                    <button type="button" class="btn btn-error btn-xs remove-item" data-product-id="${item.product_id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
                $('#sales-items').append(row);

                // Add event listeners
                $(`[data-product-id="${item.product_id}"] .quantity-input, [data-product-id="${item.product_id}"] .discount-input`)
                    .on('input', function() {
                        updateItem($(this).data('product-id'));
                    });
            }

            // Remove item
            $(document).on('click', '.remove-item', function() {
                const productId = $(this).data('product-id');
                items = items.filter(item => item.product_id != productId);
                $(`[data-product-id="${productId}"]`).remove();
                updateOrderSummary();
            });

            // Update item in array and UI
            function updateItem(productId) {
                const item = items.find(item => item.product_id == productId);
                const row = $(`[data-product-id="${productId}"]`);

                item.quantity = parseInt(row.find('.quantity-input').val()) || 0;
                item.discount = parseFloat(row.find('.discount-input').val()) || 0;

                const subtotal = item.price * item.quantity;
                const discountAmount = subtotal * (item.discount / 100);
                item.total = subtotal - discountAmount;

                row.find('.item-total').text(item.total.toFixed(2));
                updateOrderSummary();
            }

            // Update order summary
            function updateOrderSummary() {
                let subtotal = 0;
                let totalDiscount = 0;

                items.forEach(item => {
                    subtotal += item.price * item.quantity;
                    totalDiscount += (item.price * item.quantity) * (item.discount / 100);
                });

                const grandTotal = subtotal - totalDiscount;

                $('#subtotal').text(subtotal.toFixed(2));
                $('#total-discount').text(totalDiscount.toFixed(2));
                $('#grand-total').text(grandTotal.toFixed(2));
            }

            // Show error message
            function showError(message) {
                $('#error-message').text(message);
                $('#form-errors').removeClass('hidden');
                setTimeout(() => $('#form-errors').addClass('hidden'), 5000);
            }

            function resetForm() {
                // Reset form fields
                $('#sales-form')[0].reset();

                // Reset internal state
                items = [];
                $('#sales-items').empty();
                updateOrderSummary();

                // Reset date to today
                const today = new Date().toISOString().split('T')[0];
                $('#sale_date').val(today);
                $('#display-sale-date').text(today);
            }

            // Form submission
            $('#submit-sale').on('click', function() {
                if (items.length === 0) {
                    showError('Please add at least one product');
                    return;
                }

                // Prepare form data
                const formData = {
                    customer_id: $('#customer_id').val(),
                    sale_date: $('#sale_date').val(),
                    items: items.map(item => ({
                        product_id: item.product_id,
                        quantity: item.quantity,
                        price: item.price,
                        discount: item.discount
                    })),
                    notes: $('#notes').val(),
                    status: 'completed'
                };

                // Submit via AJAX
                $.ajax({
                    url: '{{ route('sales.store') }}',
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);

                            setTimeout(function() {
                                resetForm();
                            }, 1500);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorMessage = '';

                            for (const field in errors) {
                                errorMessage += errors[field].join('<br>') + '<br>';
                            }

                            showError(errorMessage);
                        } else {
                            showError('An error occurred. Please try again.');
                        }
                    }
                });
            });

            // Cancel sale
            $('#cancel-sale').on('click', function() {
                if (confirm('Are you sure you want to cancel this sale?')) {
                    window.location.href = '{{ route('sales.index') }}';
                }
            });

            // Date change handler
            $('#sale_date').on('change', function() {
                $('#display-sale-date').text($(this).val());
            });
        });
    </script>
@endpush
