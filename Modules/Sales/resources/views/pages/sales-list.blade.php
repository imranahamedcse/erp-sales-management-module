@extends('sales::layouts.master')

@section('content')
    <!-- Sales List Page -->
    <div class="page-content">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <h2 class="card-title">Sales List</h2>
                    <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto">
                        <div class="form-control">
                            <select id="customer-filter" class="select select-bordered select-sm">
                                <option value="">All Customers</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control">
                            <select id="product-filter" class="select select-bordered select-sm">
                                <option value="">All Products</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control">
                            <div class="flex items-center gap-1">
                                <input type="date" id="start-date" class="input input-bordered input-sm">
                                <span class="text-sm">to</span>
                                <input type="date" id="end-date" class="input input-bordered input-sm">
                            </div>
                        </div>
                        <button id="reset-filters" class="btn btn-outline btn-sm">
                            <i class="fas fa-undo mr-1"></i> Reset
                        </button>
                    </div>
                </div>

                <div id="sales-table-container">
                    @include('sales::partials.sales-table', ['sales' => $sales])
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Load sales data via AJAX
            function loadSales(page = 1) {
                const params = {
                    customer: $('#customer-filter').val(),
                    product: $('#product-filter').val(),
                    start_date: $('#start-date').val(),
                    end_date: $('#end-date').val(),
                    page: page
                };

                $.ajax({
                    url: '{{ route('sales.index') }}',
                    data: params,
                    success: function(data) {
                        $('#sales-table-container').html(data);
                        updatePaginationLinks();
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Update pagination links to use AJAX
            function updatePaginationLinks() {
                $('.pagination a').on('click', function(e) {
                    e.preventDefault();
                    const page = $(this).attr('href').split('page=')[1];
                    loadSales(page);
                });
            }

            // Initial setup of pagination links
            updatePaginationLinks();

            // Auto-filter on any filter change
            $('#customer-filter, #product-filter, #start-date, #end-date').on('change', function() {
                loadSales();
            });

            // Reset filters
            $('#reset-filters').click(function() {
                $('#customer-filter').val('');
                $('#product-filter').val('');
                $('#start-date').val('');
                $('#end-date').val('');
                loadSales();
            });
        });
    </script>
@endpush
