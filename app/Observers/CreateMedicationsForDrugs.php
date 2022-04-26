<?php

/**
 * @file CreateMedicationsForDrugs.php
 *
 * @date 16.12.2021
 *
 */

declare(strict_types=1);

namespace App\Observers;

use App\Models\Drug;
use App\Services\Drug\DrugService;

class CreateMedicationsForDrugs
{
    public function retrieved(Drug $drug): Drug
    {
        return DrugService::handle($drug);
    }
}
