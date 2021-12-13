<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class System extends Model
{
    use HasFactory;

    protected $casts = ['children' => 'boolean'];

    public function unit():BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
