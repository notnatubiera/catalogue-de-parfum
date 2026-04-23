<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Perfume extends Model
{
    protected $fillable = [
        'name',
        'brand_id',
        'description',
        'gender',
        'image',
        'hero_image',
        'time_of_day',
        'is_featured',
        'price',
        'longevity',
        'sillage'
    ];

    protected $casts = [
        'time_of_day' => 'array',

        'is_featured' => 'boolean',
    ];
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
