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
        Schema::table('checksheet', function (Blueprint $table) {
            $table->integer('id_approve_assman')->nullable();
            $table->integer('id_approve_spv')->nullable();
            $table->integer('is_approve')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checksheet', function (Blueprint $table) {
            $table->dropColumn('id_approve_assman');
            $table->dropColumn('id_approve_spv');
            $table->dropColumn('is_approve');
        });
    }
};
