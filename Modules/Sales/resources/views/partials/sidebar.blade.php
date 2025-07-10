<div class="drawer-side z-20">
    <label for="sidebar-toggle" class="drawer-overlay"></label>
    <div class="menu p-4 w-64 min-h-full bg-base-200 text-base-content sidebar">
        <div class="flex items-center mb-8">
            <img src="https://placehold.co/40x40" alt="Logo" class="w-10 h-10">
            <h1 class="text-xl font-bold ml-2">ERP System</h1>
        </div>

        <div class="divider my-0"></div>

        <ul>
            <li class="menu-title"><span>Main</span></li>
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home mr-2"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sales.create') }}" class="{{ request()->routeIs('sales.create') ? 'active' : '' }}">
                    <i class="fas fa-cash-register mr-2"></i> <span>Sales Entry</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sales.index') }}" class="{{ request()->routeIs('sales.index') ? 'active' : '' }}">
                    <i class="fas fa-list mr-2"></i> <span>Sales List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                    <i class="fas fa-boxes mr-2"></i> <span>Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('customers.index') }}"
                    class="{{ request()->routeIs('customers.*') ? 'active' : '' }}">
                    <i class="fas fa-users mr-2"></i> <span>Customers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('trash.index') }}" class="{{ request()->routeIs('trash.index') ? 'active' : '' }}">
                    <i class="fas fa-trash mr-2"></i> <span>Trash</span>
                </a>
            </li>
        </ul>
    </div>
</div>
