<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'advantage_products');
    }
}
