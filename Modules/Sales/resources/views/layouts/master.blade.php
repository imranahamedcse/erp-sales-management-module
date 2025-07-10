<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP - Sales Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('styles')

    <style>
        .sidebar {
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .menu-title {
            display: none;
        }

        .sidebar.collapsed .menu-item span {
            display: none;
        }

        .sidebar.collapsed .menu-item i {
            margin-right: 0;
        }

        .content-area {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="drawer lg:drawer-open">
        <input id="sidebar-toggle" type="checkbox" class="drawer-toggle" />

        <!-- Sidebar -->
        @include('sales::partials.sidebar')

        <!-- Main Content Area -->
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            @include('sales::partials.navbar')


            <!-- Page Content -->
            <div class="p-4 md:p-6" id="main-content">

                @yield('content')

            </div>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
