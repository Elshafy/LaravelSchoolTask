<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    /**
     * Get the branch that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(branch::class);
    }
    /**
     * Get all of the degree for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function degree(): HasMany
    {
        return $this->hasMany(Degree::class);
    }
}
