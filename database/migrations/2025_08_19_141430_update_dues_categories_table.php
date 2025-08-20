<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // bersihkan data lama status
        DB::statement("UPDATE dues_categories SET status = 'active' WHERE status NOT IN ('active','inactive') OR status IS NULL");

        Schema::table('dues_categories', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active')->change();
        });
    }


    public function down(): void
    {
        Schema::table('dues_categories', function (Blueprint $table) {
            $table->dropColumn(['name', 'start_date', 'end_date']);
            $table->string('status')->change();
        });
    }


};
