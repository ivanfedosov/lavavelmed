<?php

/**
 * @file 2021_06_02_180426_create_onesignal_players_table.php
 * MonitoringListResource
 * @date 02.06.2021
 *
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnesignalPlayersTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            'onesignal_players',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('patient_id');
                $table->string('player_id');
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('onesignal_players');
    }
}
