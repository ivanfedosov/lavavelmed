<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialisationsTable extends Migration
{
    /**
     * Run the migrations. $table->dropColumn(['city_id']);
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('specialisations', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
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
        Schema::dropIfExists('specialisations');
    }
}
