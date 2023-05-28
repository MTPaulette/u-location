<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Weight_product extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'price',
        'initial_stock',
        'remaining_stock',
    ];
}
