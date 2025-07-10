@extends('sales::layouts.master')

@section('content')
    <!-- Dashboard Page -->
    <div id="dashboard-page" class="page-content">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <i class="fas fa-shopping-cart text-3xl"></i>
                    </div>
                    <div class="stat-title">Total Sales</div>
                    <div class="stat-value">{{ $salesCount }}</div>
                    <div class="stat-desc">All sales from start</div>
                </div>
            </div>

            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                    <div class="stat-title">Total Customers</div>
                    <div class="stat-value">{{ $customersCount }}</div>
                    <div class="stat-desc">All customer from start</div>
                </div>
            </div>

            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-accent">
                        <i class="fas fa-box-open text-3xl"></i>
                    </div>
                    <div class="stat-title">Total Products</div>
                    <div class="stat-value">{{ $productsCount }}</div>
                    <div class="stat-desc">All products from start</div>
                </div>
            </div>

            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-info">
                        <i class="fas fa-book text-3xl"></i>
                    </div>
                    <div class="stat-title">Total Notes</div>
                    <div class="stat-value">{{ $noteCount }}</div>
                    <div class="stat-desc">All notes from start</div>
                </div>
            </div>
        </div>
    </div>
@endsection
