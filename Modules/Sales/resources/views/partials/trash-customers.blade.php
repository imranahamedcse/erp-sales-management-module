<!-- resources/views/sales/partials/trash-customers.blade.php -->
<div class="overflow-x-auto mt-4">
    <table class="table table-zebra">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Deleted On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>
                        <div class="flex items-center gap-2">
                            <div class="avatar">
                                <div class="w-10 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=random"
                                        alt="{{ $customer->name }}">
                                </div>
                            </div>
                            <span>{{ $customer->name }}</span>
                        </div>
                    </td>
                    <td>{{ $customer->email ?? 'N/A' }}</td>
                    <td>{{ $customer->phone ?? 'N/A' }}</td>
                    <td>{{ $customer->deleted_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <div class="flex gap-1">
                            <form action="{{ route('trash.restore', ['type' => 'customers', 'id' => $customer->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-success">
                                    <i class="fas fa-undo mr-1"></i> Restore
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No trashed customers found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($customers->hasPages())
    <div class="flex justify-between items-center mt-4">
        <div>
            <span class="text-sm">
                Showing {{ $customers->firstItem() }} to {{ $customers->lastItem() }} of {{ $customers->total() }}
                entries
            </span>
        </div>
        <div class="join">
            {{ $customers->links('sales::partials.pagination') }}
        </div>
    </div>
@endif
