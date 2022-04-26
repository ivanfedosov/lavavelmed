<?php

/**
 * @file NewsResourse.php
 *
 * @date 24.12.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\News;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

/**
 * @mixin News
 */
class NewsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title_ru' => $this->title_ru,
            'title_en' => $this->title_en,
            'preview_ru' => $this->preview_ru,
            'preview_en' => $this->preview_en,
            'text_ru' => $this->text_ru,
            'text_en' => $this->text_en,
            'start_day' => $this->start_day,
            'end_day' => $this->end_day,
            'active' => $this->active,
            'type' => $this->type,
            'favorite' => $this->isLikedByUser($this->id),
            'date_create' => $this->created_at,
        ];
    }

    public function isLikedByUser(int $newsId): bool
    {
        $user = Auth::user();

        return \DB::table('news_users')
            ->where('user_id', '=', $user->id)
            ->where('news_id', '=', $newsId)
            ->exists();
    }
}
