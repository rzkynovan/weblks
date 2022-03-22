<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tag_id', 'title', 'slug', 'content', 'img', 'created_at', 'updated_at'
    ];

    /**
     * Get the Tag that owns the Artikel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
