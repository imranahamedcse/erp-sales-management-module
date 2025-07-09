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
                    <div class="stat-title">Today's Sales</div>
                    <div class="stat-value">$3,450</div>
                    <div class="stat-desc">12% increase from yesterday</div>
                </div>
            </div>

            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                    <div class="stat-title">New Customers</div>
                    <div class="stat-value">1,234</div>
                    <div class="stat-desc">5% increase from last month</div>
                </div>
            </div>

            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-accent">
                        <i class="fas fa-box-open text-3xl"></i>
                    </div>
                    <div class="stat-title">Products</div>
                    <div class="stat-value">456</div>
                    <div class="stat-desc">23 low in stock</div>
                </div>
            </div>

            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-info">
                        <i class="fas fa-chart-line text-3xl"></i>
                    </div>
                    <div class="stat-title">Monthly Growth</div>
                    <div class="stat-value">8.2%</div>
                    <div class="stat-desc">Better than last month</div>
                </div>
            </div>
        </div>
    </div>
@endsection
