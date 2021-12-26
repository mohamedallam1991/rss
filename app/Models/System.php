<?php

namespace App\Models;

use App\Models\Audit;
use App\Models\Structure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class System extends Model
{
    use HasFactory;

    protected $casts = ['children' => 'boolean'];

    public function unit():BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }

    public function audits(): HasMany
    {
        return $this->hasMany(Audit::class);
    }
}
