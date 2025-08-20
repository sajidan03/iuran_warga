<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('officers', function (Blueprint $table) {
            $table->enum('previous_role', ['admin','warga','officer'])->nullable()->after('id_user');
        });
    }

    public function down()
    {
        Schema::table('officers', function (Blueprint $table) {
            $table->dropColumn('previous_role');
        });
    }

};
