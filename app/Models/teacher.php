<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\position;
use App\Models\school;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;


class teacher extends Authenticatable
{
    use HasFactory;
    /**
     * Get the job that owns the teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function position(): BelongsTo
    {
        return $this->belongsTo(position::class);
    }
    /**
     * Get the school that owns the teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }
    /**
     * Get all of the branch for the teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branch(): HasMany
    {
        return $this->hasMany(branch::class, 'teacher_id');
    }
}
