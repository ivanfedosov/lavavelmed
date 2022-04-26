<?php

/**
 * @file BmiService.php
 * MonitoringListResource
 * @date 12.05.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Bmi;

use App\Models\Bmi;
use App\Models\Patient;

class BmiService
{
    public static function handle(Patient $patient): Patient
    {
        return (new static())->mixInModel($patient);
    }

    public function calculate(int $height, int $weight): float
    {
        return ($weight / (($height / 100) ** 2));
    }

    public function mixInModel(Patient $patient): Patient
    {
        $height = $patient->getAttribute('height');
        $weight = $patient->getAttribute('max_weight');
        $isDiabetic = $patient->getAttribute('is_diabetic');

        if (!$height || !$weight) {
            $patient->setAttribute('bmi', ['value' => false]);
            return $patient;
        }

        $bmiValue = $this->calculate($height, $weight);
        $bmi['value'] = (int) round($bmiValue);

        $bmiTitleAndText = $this->getBmiTitleAndText($bmiValue, $isDiabetic);

        if ($bmiTitleAndText) {
            $bmi = array_merge($bmi, $bmiTitleAndText);
        }

        $patient->setAttribute('bmi', $bmi);

        return $patient;
    }

    public function getBmiTitleAndText(float $bmiValue, bool $isDiabetic): ?array
    {
        $bmiData = Bmi::where([
            ['is_diabetic', '=', $isDiabetic],
            ['min', '<=', $bmiValue],
            ['max', '>=', $bmiValue],
        ])->first();

        if (!$bmiData) {
            return null;
        }

        return [
            'title' => $bmiData->getAttribute('title'),
            'text' => $bmiData->getAttribute('text'),
        ];
    }
}
