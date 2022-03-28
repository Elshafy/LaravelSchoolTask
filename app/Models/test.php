<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class test extends Model
{
    use HasFactory;
    public function branch(): BelongsTo
    {
        return $this->belongsTo(branch::class);
    }
}
