<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Sales\Database\Factories\NoteFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'notable_id',
        'notable_type'
    ];

    public function notable()
    {
        return $this->morphTo();
    }
}
