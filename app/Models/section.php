<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class section extends Model
{
    use HasFactory;
    /**
     * Get all of the branch for the section
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branch(): HasMany
    {
        return $this->hasMany(branch::class);
    }
    /**
     * Get the schoole that owns the section
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schoole(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }
}
