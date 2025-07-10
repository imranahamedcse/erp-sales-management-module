<?php

namespace Modules\Sales\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Sales\Models\Customer;
use Modules\Sales\Models\Product;
use Modules\Sales\Models\Sale;
use Illuminate\Support\Str;
use Modules\Sales\Models\SaleItem;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::orderBy('name')->get();
        $products = Product::orderBy('name')->get();

        $query = Sale::with(['customer', 'items.product'])
            ->withCount('items')
            ->latest();

        if ($request->has('customer') && $request->customer) {
            $query->where('customer_id', $request->customer);
        }

        if ($request->has('product') && $request->product) {
            $query->whereHas('items', function ($q) use ($request) {
                $q->where('product_id', $request->product);
            });
        }

        if (
            $request->has('start_date') && $request->start_date &&
            $request->has('end_date') && $request->end_date
        ) {
            $query->whereBetween('sale_date', [$request->start_date, $request->end_date]);
        }

        $sales = $query->paginate(10);

        if ($request->ajax()) {
            return view('sales::partials.sales-table', compact('sales'))->render();
        }

        return view('sales::pages.sales-list', compact('sales', 'customers', 'products'));
    }

    // নতুন সেলস ফর্ম
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('sales::pages.sale-entry', compact('customers', 'products'));
    }

    // সেলস স্টোর
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'sale_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0|max:100',
            'notes' => 'nullable|string'
        ]);

        // টোটাল ক্যালকুলেশন
        $totalAmount = 0;
        $items = [];

        foreach ($request->items as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $discount = $subtotal * ($item['discount'] ?? 0) / 100;
            $total = $subtotal - $discount;

            $items[] = [
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
                'discount_percent' => $item['discount'] ?? 0,
                'total_price' => $total
            ];

            $totalAmount += $total;
        }

        // সেলস ক্রিয়েট
        $sale = Sale::create([
            'customer_id' => $request->customer_id,
            'sale_date' => $request->sale_date,
            'invoice_number' => 'INV-' . Str::random(8),
            'total_amount' => $totalAmount,
            'payment_status' => 'unpaid',
            'status' => 'completed'
        ]);

        // সেলস আইটেমস সেভ
        $sale->items()->createMany($items);

        // নোটস সেভ
        if ($request->notes) {
            $sale->notes()->create(['content' => $request->notes]);
        }

        return redirect()->route('sales.show', $sale->id)
            ->with('success', 'Sale created successfully!');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('sales::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('sales::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')
            ->with('success', 'Sale moved to trash successfully!');
    }
}
