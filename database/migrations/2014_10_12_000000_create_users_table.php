<?php

declare(strict_types=1);

/**
 * @file 2014_10_12_000000_create_users_table.php
 * MonitoringListResource
 * @date 18.03.2021
 *
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('account_type');
            $table->string('full_name')->nullable();
            $table->string('phone', '16')->unique();
            $table->string('email', '255')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_banned')->default(0);
            $table->string('lang')->nullable();
            $table->string('timezone', 5)->nullable();
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('users');
    }
}
