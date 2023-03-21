<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content'
    ];

    public function theme(): BelongsTo {
        return $this->belongsTo(Theme::class);
    }

    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }
}
