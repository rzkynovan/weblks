<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the Artikel for the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Artikel(): HasMany
    {
        return $this->hasMany(Artikel::class);
    }
}
