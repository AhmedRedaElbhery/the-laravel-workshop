<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'name',
        'handel',
        'bio',
        'avatar_url'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(post::class);
    }

    public function topLevelPosts(): HasMany
    {
        return $this->hasMany(post::class)->whereNull('parent_id');
    }
}
