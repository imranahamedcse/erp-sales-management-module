@extends('sales::layouts.master')

@section('content')
    <!-- Trash Page -->
    <div class="page-content">
        <div class="card bg-base-100 shadow">
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="tabs">
                    <a class="tab tab-active" data-tab="sales">Sales</a>
                    <a class="tab" data-tab="products">Products</a>
                    <a class="tab" data-tab="customers">Customers</a>
                </div>

                <div id="sales-tab-content" class="tab-content active">
                    @include('sales::partials.trash-sales', ['sales' => $sales])
                </div>

                <!-- Products Tab Content (Hidden by default) -->
                <div id="products-tab-content" class="tab-content hidden">
                    <!-- Similar structure for products -->
                    @include('sales::partials.trash-products', ['products' => $products])
                </div>

                <!-- Customers Tab Content (Hidden by default) -->
                <div id="customers-tab-content" class="tab-content hidden">
                    <!-- Similar structure for customers -->
                    @include('sales::partials.trash-customers', ['customers' => $customers])
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.tabs .tab').on('click', function(e) {
                e.preventDefault();
                const tabName = $(this).data('tab');

                $('.tabs .tab').removeClass('tab-active');
                $(this).addClass('tab-active');

                $('.tab-content').removeClass('active').addClass('hidden');
                $(`#${tabName}-tab-content`).removeClass('hidden').addClass('active');

                if (!$(this).hasClass('loaded') && tabName !== 'sales') {
                    $.get('{{ route('trash.index') }}', {
                        type: tabName
                    }, function(data) {
                        $(`#${tabName}-tab-content`).html(data);
                        $(`[data-tab="${tabName}"]`).addClass('loaded');
                    });
                }
            });
        });
    </script>
@endpush
