<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTypesInDrugs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE drugs ALTER COLUMN
                  frequency TYPE integer USING (frequency)::integer');
        DB::statement('ALTER TABLE drugs ALTER COLUMN
                  planned TYPE integer USING (planned)::integer');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drugs', function (Blueprint $table) {
            $table->string('frequency')->change();
            $table->string('planned')->change();
        });
    }
}
