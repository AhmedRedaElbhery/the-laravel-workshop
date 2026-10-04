<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'content'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(profile::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(post::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->HasMany(post::class, 'parent_id');
    }
}
