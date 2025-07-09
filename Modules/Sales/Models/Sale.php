<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Sales\Database\Factories\SalesFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'sale_date',
        'invoice_number',
        'total_amount',
        'discount_amount',
        'paid_amount',
        'due_amount',
        'payment_status',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
