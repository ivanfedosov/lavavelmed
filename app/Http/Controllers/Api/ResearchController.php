<?php

/**
 * @file ResearchController.php
 *
 * @date 25.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchCreateRequest;
use App\Http\Requests\ResearchUpdateRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\ResearchResource;
use App\Models\Patient;
use App\Models\Research;
use App\Repositories\ResearchRepository;
use App\Services\Research\ResearchService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    public function __construct(
        private ResearchService $researchService,
        private ResearchRepository $researchRepository,
    ) {
    }

    public function index(Request $request): ResourceCollection
    {
        /** @var Patient $patient */
        $patient = $request->user()->patient;
        $categories = $patient->researchCategories;

        return CategoryResource::collection($categories);
    }

    public function show(Request $request, Research $research): ResearchResource
    {
        /** @var Patient $patient */
        $patient = $request->user()->patient;

        return new ResearchResource($research);
    }

    /**
     * @throws \Throwable
     */
    public function create(ResearchCreateRequest $request): void
    {
        //TODO
        $entity = $request->entity();

        DB::transaction(function () use ($entity) {
            $this->researchService->create($entity);
        });
    }

    /**
     * @throws \Throwable
     */
    public function update(ResearchUpdateRequest $request, Research $research): void
    {

            $data = $request->entity();
            $this->researchService->update($data, $research);
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Research $research): void
    {
        //TODO
        DB::beginTransaction();

        try {
            $this->researchRepository->destroy($research->id);
            DB::commit();
        } catch (\Throwable) {
            DB::rollBack();
        }
    }
}
