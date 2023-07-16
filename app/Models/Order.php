<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // 'confirmation_number',
        'billing_email',
        'billing_name',
        // 'billing_name_on_card',
        'billing_city',
        'billing_address',
        // 'billing_state',
        // 'billing_zip_code',
        'billing_discount',
        'billing_discount_code',
        'billing_subtotal',
        'billing_tax',
        'billing_total',
        'shipped',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:F j, Y',
    ];

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * The products that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class)
                    ->withPivot('weight', 'unit_price', 'quantity');
        // return $this->belongsToMany(Product::class, 'order_products')
        //             ->using(Order_product::class)
        //             ->withPivot('weight', 'unit_price', 'quantity');
    }
    
    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }
}
