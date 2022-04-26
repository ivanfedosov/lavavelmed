<?php

/**
 * @file CategoryController.php
 *
 * @date 28.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use App\Models\User;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerInterface;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private LoggerInterface $logger,
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        return CategoryResource::collection($patient->researchCategories);
    }

    public function show(Request $request, Category $category): CategoryResource
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        $isCategoryExist = $patient->researchCategories()->where('id', $category->id)->exists();

        if ($isCategoryExist === false) {
            //TODO: exception из PQ
            throw new \Exception();
        }

        return new CategoryResource($category);
    }

    /**
     * @throws \Throwable
     */
    public function create(CategoryCreateRequest $request): void
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        $data = $request->validated();
        $data['patient_id'] = $patient->id;

        DB::transaction(function () use ($data) {
            $this->categoryRepository->create($data);
        });
    }

    /**
     * @throws \Throwable
     */
    public function update(CategoryUpdateRequest $request, Category $category): void
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $category) {
            $this->categoryRepository->update($data, $category->id);
        });
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Request $request, Category $category): void
    {
        /** @var User $user */
        $user = $request->user();

        $this->logger->info("User with email {$user->full_name} trying to destroy category {$category->title}", [
            'data' => [
                'username' => $user->getAttribute('full_name'),
                'category_id' => $category->id,
                'category_title' => $category->title,
            ],
        ]);

        DB::transaction(function () use ($category) {
            $category->research()->delete();
            $this->categoryRepository->destroy($category->id);
        });
    }
}
