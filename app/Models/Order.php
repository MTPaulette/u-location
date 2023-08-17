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
        // 'user_id',
        // 'confirmation_number',
        // 'email',
        // 'name',
        // 'name_on_card',

        // 'city',
        // 'address',

        // 'state',
        // 'zip_code',
        'code',
        'discount',
        'discount_code',
        'subtotal',
        'tax',
        'total',
        'confirmed',
        'shipped',
        'paiement_mode',
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
        return $this->belongsToMany(Product::class, 'order_products')
                    ->using(Order_product::class)
                    ->withPivot('weight', 'price', 'qty', 'totalPrice');
    }

    // public function products(): BelongsToMany {
    //     return $this->belongsToMany(Product::class)
    //                 ->withPivot('weight', 'price', 'qty', 'totalPrice');
    // }
    
    public function address(): BelongsTo {
        return $this->belongsTo(Address::class);
    }
}
