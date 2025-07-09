@extends('sales::layouts.master')

@section('content')
    <!-- Trash Page -->
    <div id="trash-page" class="page-content hidden">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h2 class="card-title">Trash</h2>
                    <div class="flex gap-2 mt-2 md:mt-0">
                        <button class="btn btn-error btn-sm">
                            <i class="fas fa-trash mr-1"></i> Empty Trash
                        </button>
                    </div>
                </div>

                <div class="tabs">
                    <a class="tab tab-active">Sales</a>
                    <a class="tab">Products</a>
                    <a class="tab">Customers</a>
                </div>

                <div class="overflow-x-auto mt-4">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Deleted On</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>INV-2023-005</td>
                                <td>Test Customer</td>
                                <td>2023-07-15</td>
                                <td>2023-07-16</td>
                                <td>$150.00</td>
                                <td>
                                    <div class="flex gap-1">
                                        <button class="btn btn-xs btn-success">
                                            <i class="fas fa-undo mr-1"></i> Restore
                                        </button>
                                        <button class="btn btn-xs btn-error">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>INV-2023-004</td>
                                <td>Old Customer</td>
                                <td>2023-07-10</td>
                                <td>2023-07-12</td>
                                <td>$75.00</td>
                                <td>
                                    <div class="flex gap-1">
                                        <button class="btn btn-xs btn-success">
                                            <i class="fas fa-undo mr-1"></i> Restore
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
                        <span class="text-sm">Showing 1 to 2 of 2 entries</span>
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
