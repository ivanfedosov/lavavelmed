<?php

/**
 * @file DrugUpdateRequest.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrugUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            'dosage' => ['string', 'max:255'],
            'frequency' => ['integer'],
            'timers' => ['string', 'max:255'],
            'planned' => ['integer'],
            'start_date' => ['string', 'max:10'],
            'end_date' => ['string', 'max:10'],
        ];
    }
}
