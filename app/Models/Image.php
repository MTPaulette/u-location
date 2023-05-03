<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename',
    ];

    protected $appends = [
        'src',
    ];

    public function getSrcAttribute() {
        return asset("storage/{$this->filename}");
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
