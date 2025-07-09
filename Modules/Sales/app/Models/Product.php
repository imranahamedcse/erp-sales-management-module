<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Sales\Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'code', 'price', 'description'];

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
