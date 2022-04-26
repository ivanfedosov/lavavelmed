<?php

/**
 * @file 2021_05_20_125838_create_medications_table.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationsTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            'medications',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('patient_id');
                $table->integer('drug_id');
                $table->string('notification_id');
                $table->string('date');
                $table->smallInteger('status');
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
}
