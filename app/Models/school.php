<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class school extends Model
{
    use HasFactory;
    /**
     * Get the teacher associated with the school
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin(): HasOne
    {
        return $this->hasOne(teacher::class)->where('position_id', '1');
    }
    /**
     * Get all of the teacher for the school
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teacher(): HasMany
    {
        return $this->hasMany(teacher::class)->where('position_id', '!=', '1');
    }
    public function section(): HasMany
    {
        return $this->hasMany(section::class);
    }
    /**
     * Get all of the question for the school
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function question(): HasMany
    {
        return $this->hasMany(Question::class,);
    }
}
