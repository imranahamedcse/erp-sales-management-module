@extends('sales::layouts.master')

@section('content')
    <!-- Customers Page -->
    <div id="customers-page" class="page-content hidden">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h2 class="card-title">Customers</h2>
                    <button class="btn btn-primary mt-2 md:mt-0">
                        <i class="fas fa-plus mr-1"></i> Add Customer
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Total Orders</th>
                                <th>Total Spent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="avatar">
                                            <div class="w-10 rounded-full">
                                                <img src="https://placehold.co/40x40" alt="Customer">
                                            </div>
                                        </div>
                                        <span>John Doe</span>
                                    </div>
                                </td>
                                <td>john@example.com</td>
                                <td>+1 234 567 890</td>
                                <td>12</td>
                                <td>$4,250.00</td>
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
                                            <div class="w-10 rounded-full">
                                                <img src="https://placehold.co/40x40" alt="Customer">
                                            </div>
                                        </div>
                                        <span>Jane Smith</span>
                                    </div>
                                </td>
                                <td>jane@example.com</td>
                                <td>+1 987 654 321</td>
                                <td>8</td>
                                <td>$2,150.00</td>
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
                                            <div class="w-10 rounded-full">
                                                <img src="https://placehold.co/40x40" alt="Customer">
                                            </div>
                                        </div>
                                        <span>Acme Corporation</span>
                                    </div>
                                </td>
                                <td>contact@acme.com</td>
                                <td>+1 555 123 456</td>
                                <td>5</td>
                                <td>$3,450.00</td>
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
