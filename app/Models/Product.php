<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
        'initial_stock',
        'remaining_stock',
        'reduction'
    ];

    // protected $dateFormat = 'U';

    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class, 'product_orders');
    }
}
