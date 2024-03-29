<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Weight extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'weight_products')
                    ->using(Weight_product::class)
                    ->withPivot('price', 'initial_stock', 'remaining_stock');
    }
}
