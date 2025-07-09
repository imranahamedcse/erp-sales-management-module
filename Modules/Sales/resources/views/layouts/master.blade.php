<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP - Sales Management</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    <script>
        $(document).ready(function() {
            // Set current date
            const today = new Date();
            $('#sale-date').text(today.toISOString().split('T')[0]);

            // Navigation
            $('.sidebar a').on('click', function(e) {
                e.preventDefault();
                const target = $(this).attr('href').substring(1);

                // Update active menu item
                $('.sidebar a').removeClass('active');
                $(this).addClass('active');

                // Update page title
                $('#page-title').text($(this).find('span').text());

                // Show the correct page
                $('.page-content').addClass('hidden');
                $(`#${target}-page`).removeClass('hidden');
            });

            // Sales Entry functionality
            $('#add-item-btn').on('click', function() {
                const newRow = `
                    <tr>
                        <td>
                            <select class="select select-bordered select-sm w-full max-w-xs product-select">
                                <option disabled selected>Select product</option>
                                <option data-price="1200">Laptop</option>
                                <option data-price="350">Mouse</option>
                                <option data-price="2500">Monitor</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="input input-bordered input-sm w-24 price-input" value="0" readonly>
                        </td>
                        <td>
                            <input type="number" class="input input-bordered input-sm w-20 quantity-input" value="1" min="1">
                        </td>
                        <td>
                            <div class="flex items-center">
                                <input type="number" class="input input-bordered input-sm w-16 discount-input" value="0" min="0" max="100">
                                <span class="ml-1">%</span>
                            </div>
                        </td>
                        <td>
                            <span class="item-total">0.00</span>
                        </td>
                        <td>
                            <button class="btn btn-error btn-xs remove-item">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
                $('#sales-items').append(newRow);

                // Add event listeners to the new row
                addRowEventListeners($('#sales-items tr').last());
            });

            // Remove item
            $(document).on('click', '.remove-item', function() {
                $(this).closest('tr').remove();
                updateOrderSummary();
            });

            // Function to add event listeners to a row
            function addRowEventListeners(row) {
                const productSelect = row.find('.product-select');
                const priceInput = row.find('.price-input');
                const quantityInput = row.find('.quantity-input');
                const discountInput = row.find('.discount-input');
                const itemTotal = row.find('.item-total');

                // Product select change
                productSelect.on('change', function() {
                    if ($(this).val()) {
                        const selectedOption = $(this).find('option:selected');
                        const price = selectedOption.data('price');
                        priceInput.val(price);
                        calculateRowTotal();
                        updateOrderSummary();
                    } else {
                        priceInput.val('0');
                        calculateRowTotal();
                        updateOrderSummary();
                    }
                });

                // Quantity and discount changes
                quantityInput.on('input', function() {
                    calculateRowTotal();
                    updateOrderSummary();
                });

                discountInput.on('input', function() {
                    calculateRowTotal();
                    updateOrderSummary();
                });

                // Calculate row total
                function calculateRowTotal() {
                    const price = parseFloat(priceInput.val()) || 0;
                    const quantity = parseInt(quantityInput.val()) || 0;
                    const discount = parseFloat(discountInput.val()) || 0;

                    const subtotal = price * quantity;
                    const discountAmount = subtotal * (discount / 100);
                    const total = subtotal - discountAmount;

                    itemTotal.text(total.toFixed(2));
                }
            }

            // Update order summary
            function updateOrderSummary() {
                let subtotal = 0;
                let totalDiscount = 0;

                $('#sales-items tr').each(function() {
                    const price = parseFloat($(this).find('.price-input').val()) || 0;
                    const quantity = parseInt($(this).find('.quantity-input').val()) || 0;
                    const discount = parseFloat($(this).find('.discount-input').val()) || 0;

                    const rowSubtotal = price * quantity;
                    const rowDiscount = rowSubtotal * (discount / 100);

                    subtotal += rowSubtotal;
                    totalDiscount += rowDiscount;
                });

                const grandTotal = subtotal - totalDiscount;

                $('#subtotal').text(subtotal.toFixed(2));
                $('#total-discount').text(totalDiscount.toFixed(2));
                $('#grand-total').text(grandTotal.toFixed(2));
            }

            // Initialize first row
            addRowEventListeners($('#sales-items tr').first());
        });
    </script>
</body>

</html>
