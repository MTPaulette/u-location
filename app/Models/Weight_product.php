<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'initial_stock',
        'remaining_stock',
    ];
}
