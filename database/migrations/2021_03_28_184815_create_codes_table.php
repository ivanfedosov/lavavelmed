<?php

/**
 * @file 2021_03_28_184815_create_codes_table.php
 * MonitoringListResource
 * @date 28.03.2021
 *
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            'codes',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('phone', 30);
                $table->smallInteger('value')->unsigned();
                $table->timestamp('created_at')->nullable();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('codes');
    }
}
