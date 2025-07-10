<?php

namespace Modules\Sales\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Sales\Models\Customer;
use Modules\Sales\Models\Product;
use Modules\Sales\Models\Sale;

class TrashController extends Controller
{
    public function index()
    {
        $sales = Sale::onlyTrashed()
            ->with(['customer' => fn($q) => $q->withTrashed()])
            ->latest()
            ->paginate(10, ['*'], 'sales_page');

        $products = Product::onlyTrashed()
            ->latest()
            ->paginate(10, ['*'], 'products_page');

        $customers = Customer::onlyTrashed()
            ->latest()
            ->paginate(10, ['*'], 'customers_page');

        if (request()->ajax()) {
            $type = request('type', 'sales');
            return view("sales::partials.trash-{$type}", [
                $type => $$type
            ]);
        }

        return view('sales::pages.trash', compact('sales', 'products', 'customers'));
    }

    public function restore($type, $id)
    {
        try {
            $model = $this->getModel($type);
            $item = $model::onlyTrashed()->findOrFail($id);
            $item->restore();

            return redirect()->back()
                ->with('success', ucfirst($type) . ' restored successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to restore: ' . $e->getMessage());
        }
    }

    protected function getModel($type)
    {
        return match ($type) {
            'sales' => Sale::class,
            'products' => Product::class,
            'customers' => Customer::class,
            default => throw new \InvalidArgumentException("Invalid type: {$type}")
        };
    }
}
