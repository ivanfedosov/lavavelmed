<?php

/**
 * @file DrugController.php
 * MonitoringListResource
 * @date 02.06.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DrugCreateRequest;
use App\Http\Requests\DrugUpdateRequest;
use App\Http\Resources\Api\DrugResource;
use App\Models\Drug;
use App\Models\User;
use App\Repositories\DrugRepository;
use App\Services\Drug\DrugService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DrugController extends Controller
{
    public function __construct(
        protected DrugService $drugService,
        protected DrugRepository $drugRepository,
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function index(Request $request): ResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        $drugs = $user->patient->drugs;

        return DrugResource::collection($drugs);
    }

    public function show(Request $request, Drug $drug): DrugResource
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        $isDrugExists = $patient->drugs()->where('id', $drug->id)->exists();

        if ($isDrugExists === false) {
            //TODO: exception из PQ
            throw new \Exception();
        }

        return new DrugResource($drug);
    }

    /**
     * @throws \Throwable
     */
    public function create(DrugCreateRequest $request): void
    {
        $drugEntity = $request->entity();
        //TODO
        $this->drugService->create($drugEntity);
    }

    public function update(DrugUpdateRequest $request, Drug $drug): void
    {
        $data = $request->validated();

        $this->drugService->update($data, $drug);
    }

    public function destroy(Request $request, Drug $drug): void
    {
        $drugRecord = $request->user()->patient->drugs()->where('id', $drug->id)->firstOrFail();
        $drug->medications()->delete();

        $this->drugRepository->destroy($drug->id);
    }
}
