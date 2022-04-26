<?php

/**
 * @file User.php
 * MonitoringListResource
 * @date 18.03.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use InteractsWithMedia;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public const PATIENT = 1;
    public const DOCTOR = 2;
    public const ADMIN = 9;

    public const ROLES = [
        self::DOCTOR => 'DOCTOR',
        self::PATIENT => 'PATIENT',
        self::ADMIN => 'ADMIN',
    ];

    protected $fillable = [
        'account_type',
        'full_name',
        'first_name',
        'second_name',
        'last_name',
        'phone',
        'email',
        'is_banned',
        'lang',
        'timezone',
    ];

    protected $casts = [
        'is_banned' => 'boolean',
    ];

    protected $appends = [
        'bmi',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'remember_token',
    ];

    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }

    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

    public function getBmiAttribute(): HasMany
    {
        return $this->hasMany(Bmi::class);
    }

    public function favoriteNews(): BelongsToMany
    {
        return $this->belongsToMany(
            News::class,
            'news_users',
            'user_id',
            'news_id',
        );
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(183)
            ->height(205)
            ->sharpen(10);
    }
}
