<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->boolean('is_activated')->default(0);
            $table->string('qualification', '255')->nullable();
            $table->string('job', '255')->nullable();
            $table->tinyInteger('experience')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_twitter')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_prodoctorov')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('specialisation_id')->nullable();
            $table->unsignedInteger('hospital_id')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
