<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('dues_categories', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])
                  ->default('active')
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('dues_categories', function (Blueprint $table) {
            $table->string('status')->change(); 
        });
    }
};
