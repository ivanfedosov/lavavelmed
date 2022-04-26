<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApproveStatusForPatient extends Migration
{
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('approve_status')->default(2);
            $table->dropColumn('is_approved');
        });
    }

    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->boolean('is_approved')->default(0);
            $table->dropColumn('approve_status');
        });
    }
}
