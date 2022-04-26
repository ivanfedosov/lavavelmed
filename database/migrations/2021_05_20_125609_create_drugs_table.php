<?php

/**
 * @file 2021_05_20_125609_create_drugs_table.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            'drugs',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('patient_id');
                $table->string('title');
                $table->string('dosage');
                $table->string('frequency');
                $table->json('timers');
                $table->string('planned');
                $table->timestamp('start_date');
                $table->timestamp('end_date');
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
}
