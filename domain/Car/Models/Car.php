<?php

namespace Domain\Car\Models;

use Domain\Brand\Models\Brand;
use Domain\Tag\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
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


    public function brands(): MorphToMany
    {
        return $this->morphedByMany(Brand::class, 'carable');
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'carable');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    // public function carable()
    // {
    //     return $this->morphTo();
    // }
}
