<?php

/**
 * @file CreateBmiValuesTable.php
 * MonitoringListResource
 * @date 12.05.2021
 *
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBmiValuesTable extends Migration
{
    public function up(): void
    {
        Schema::create('bmi_values', function (Blueprint $table) {
                $table->increments('id');
                $table->float('min');
                $table->float('max');
                $table->boolean('is_diabetic');
                $table->text('title');
                $table->text('text');
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('bmi_values');
    }
}
