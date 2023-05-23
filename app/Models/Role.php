<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
    
    // public function users(): BelongsToMany {
    //     return $this->belongsToMany(User::class, 'role_users');
    // }
}
