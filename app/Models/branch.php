<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class branch extends Model
{
    use HasFactory;
    /**
     * Get the teacher that owns the branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(teacher::class);
    }
    public function section(): BelongsTo
    {
        return $this->belongsTo(section::class);
    }
    public function schoole(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }
    /**
     * Get the work associated with the branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function work(): HasOne
    {
        return $this->hasOne(Work::class);
    }
    public function test(): HasOne
    {
        return $this->hasOne(test::class);
    }
    /**
     * Get all of the student for the branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
