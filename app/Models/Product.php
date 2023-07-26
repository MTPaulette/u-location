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
        'reduction'
    ];

    // protected $dateFormat = 'U';
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class);
        
        // return $this->belongsToMany(Order::class, 'order_products')
        //             ->using(Order_product::class)
        //             ->withPivot('weight', 'unit_price', 'quantity');
    }
    
    public function advantages(): BelongsToMany {
        return $this->belongsToMany(Advantage::class, 'advantage_products');
    }
    
    public function ingredients(): BelongsToMany {
        return $this->belongsToMany(Ingredient::class, 'ingredient_products');
    }

    public function weights(): BelongsToMany {
        
        return $this->belongsToMany(Weight::class, 'weight_products')
                    ->using(Weight_product::class)
                    ->withPivot('price', 'initial_stock', 'remaining_stock');
    }
}
