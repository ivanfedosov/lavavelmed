<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\NewsResource;
use App\Models\News;
use App\Models\User;
use App\Services\News\NewsService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

//TODO
class NewsController
{
    public function __construct(
        protected NewsService $newsService
    ) {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        $news = $this->newsService->getTargetNews($user->patient);

        return NewsResource::collection($news);
    }

    public function show(Request $request, News $news): NewsResource
    {
        $user = $request->user();

        return new NewsResource($news);
    }

    public function targetNews(Request $request): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        $news = $this->newsService->getAllNews($user->patient);

        return NewsResource::collection($news);
    }

    public function showFavoriteNews(Request $request): AnonymousResourceCollection
    {
        /** @var  User $user */
        $user = $request->user();

        return NewsResource::collection($user->favoriteNews);
    }

    public function addNewsToUserFavorites(Request $request, News $news): void
    {
        /** @var  User $user */
        $user = $request->user();

        $user->favoriteNews()->attach($news->id);
    }

    public function deleteNewsFromUserFavorites(Request $request, News $news): void
    {
        /** @var User $user */
        $user = $request->user();

        $user->favoriteNews()->detach($news->id);
    }
}
