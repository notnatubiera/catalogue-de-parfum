<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Perfume extends Model
{
    protected $fillable = ['name', 'brand_id', 'price', 'volume', 'description', 'sizes'];
    protected function casts(): array
    {
        return [
            'sizes' => 'array',
        ];
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function occasions(): BelongsToMany
    {
        return $this->belongsToMany(Occasion::class);
    }

    public function seasons(): BelongsToMany
    {
        return $this->belongsToMany(Season::class);
    }
}
