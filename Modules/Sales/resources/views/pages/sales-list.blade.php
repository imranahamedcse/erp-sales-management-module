@extends('sales::layouts.master')

@section('content')
    <!-- Sales List Page -->
    <div id="sales-list-page" class="page-content hidden">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h2 class="card-title">Sales List</h2>
                    <div class="flex gap-2 mt-2 md:mt-0">
                        <div class="form-control">
                            <input type="text" placeholder="Search..." class="input input-bordered" />
                        </div>
                        <div class="dropdown">
                            <label tabindex="0" class="btn btn-outline">
                                <i class="fas fa-filter mr-1"></i> Filter
                            </label>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                <li><a>Today</a></li>
                                <li><a>This Week</a></li>
                                <li><a>This Month</a></li>
                                <li><a>Custom Range</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-primary">
                            <i class="fas fa-file-export mr-1"></i> Export
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>INV-2023-001</td>
                                <td>John Doe</td>
                                <td>2023-07-20</td>
                                <td>3</td>
                                <td>$1,250.00</td>
                                <td><span class="badge badge-success">Completed</span></td>
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
                                <td>INV-2023-002</td>
                                <td>Acme Corp</td>
                                <td>2023-07-19</td>
                                <td>5</td>
                                <td>$3,450.00</td>
                                <td><span class="badge badge-success">Completed</span></td>
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
                                <td>INV-2023-003</td>
                                <td>Jane Smith</td>
                                <td>2023-07-18</td>
                                <td>2</td>
                                <td>$850.00</td>
                                <td><span class="badge badge-warning">Draft</span></td>
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
                        <button class="join-item btn btn-sm btn-disabled">»</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
