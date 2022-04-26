<?php

/**
 * @file News.php
 *
 * @date 08.06.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    use CrudTrait;
    use InteractsWithMedia;

    protected $table = 'news';

    public const LANG_RU = 1;
    public const LANG_EN = 2;

    public const BEFORE_OPERATION = 1;
    public const IN_OPERATION = 2;
    public const AFTER_OPERATION = 3;
    public const IN_HOSPITALISATION = 4;
    public const IN_LEAVING = 5;
    public const MONITORING = 6;

    protected $fillable = [
        'title_ru',
        'title_en',
        'text_en',
        'text_ru',
        'preview_en',
        'preview_ru',
        'start_day',
        'end_day',
        'active',
        'type',
        'lang',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(183)
            ->height(205)
            ->sharpen(10);
    }

    public function likedUsers(): BelongsToMany
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
         return $this->belongsToMany(
             User::class,
             'news_users',
             'news_id',
             'user_id',
         );
    }
}
