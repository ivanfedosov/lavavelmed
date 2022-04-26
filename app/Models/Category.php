<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'title',
        'research_id',
        'patient_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function research(): HasMany
    {
        return $this->HasMany(Research::class, 'category_id');
    }
}
