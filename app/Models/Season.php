<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Season extends Model
{
    protected $fillable = ['name'];
    public function perfumes(): BelongsToMany
    { return $this->belongsToMany(Perfume::class); }
}
