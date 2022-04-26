<?php

/**
 * @file DrugCreateRequest.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Patient;
use App\Models\User;
use App\Services\Drug\Entities\DrugCreateEntity;
use Illuminate\Foundation\Http\FormRequest;

class DrugCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'planned' => ['required', 'integer'],
            'timers' => ['string', 'max:255'],
            'dosage' => ['required', 'string', 'max:255'],
            'frequency' => ['required', 'integer'],
            'start_date' => ['required', 'string', 'max:10'],
            'end_date' => ['required', 'string', 'max:10'],
        ];
    }

    public function entity(): DrugCreateEntity
    {
        $data = $this->validated();

        if (!array_key_exists('timers', $data)) {
            $data['timers'] = '';
        }

        /** @var User $user */
        $user = $this->user();
        /** @var Patient $patient */
        $patient = $user->patient;

        return new DrugCreateEntity(
            (string) $data['title'],
            (int) $data['planned'],
            (string) $data['timers'],
            (string) $data['dosage'],
            (int) $data['frequency'],
            (string) $data['start_date'],
            (string) $data['end_date'],
            $patient->id,
        );
    }
}
