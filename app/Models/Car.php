<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'brand_id',
        'description',
        'image',
        'carable_id',
        'carable_type',
    ];


    public function brand(): BelongsTo
    {
        return $this->BelongsTo(related: Brand::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(related: Tag::class);
    }

    public function carable()
    {
        return $this->morphTo();
    }
}
