<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('doctor_id')->nullable();
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_diabetic')->nullable();
            $table->boolean('is_profile_filled')->nullable();
            $table->tinyInteger('max_weight')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->tinyInteger('height')->nullable();
            $table->timestamp('hospitalisation_date')->nullable();
            $table->timestamp('leaving_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
}
