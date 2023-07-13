<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Order_product extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'weight',
        'unit_price',
        'quantity',
    ];
}
