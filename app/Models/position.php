<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class position extends Model
{
    use HasFactory;
    /**
     * Get all of the teacher for the position
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teacher(): HasMany
    {
        return $this->hasMany(teacher::class);
    }
}
