<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        // 'created_at'
    ];

    /*
    public function setCreatedAtAttribute() {
        // return $this->created_at->diffForHumans();
        return new Carbon($this->created_at);
    }
    */

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function theme(): BelongsTo {
        return $this->belongsTo(Theme::class);
    }

    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }
}
