<?php

/**
 * @file Category.php
 *
 * @date 25.10.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Research extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'patient_id',
        'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function category(): HasMany
    {
        return $this->hasMany(Category::class, 'research_id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(183)
            ->height(205)
            ->sharpen(10);
    }
}
