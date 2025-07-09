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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="card-title">Recent Sales</h2>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>INV-2023-001</td>
                                    <td>John Doe</td>
                                    <td>$1,250.00</td>
                                    <td>2023-07-20</td>
                                </tr>
                                <tr>
                                    <td>INV-2023-002</td>
                                    <td>Acme Corp</td>
                                    <td>$3,450.00</td>
                                    <td>2023-07-19</td>
                                </tr>
                                <tr>
                                    <td>INV-2023-003</td>
                                    <td>Jane Smith</td>
                                    <td>$850.00</td>
                                    <td>2023-07-18</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary btn-sm">View All</button>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="card-title">Sales Chart</h2>
                    <div class="h-64 bg-gray-100 rounded flex items-center justify-center">
                        <p class="text-gray-500">Sales chart will be displayed here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
