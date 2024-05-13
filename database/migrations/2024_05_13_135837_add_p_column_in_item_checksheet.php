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
        //add p1,p3,p6,p12
        Schema::table('item_checksheet', function (Blueprint $table) {
            $table->integer('harian')->nullable();
            $table->integer('p1')->nullable();
            $table->integer('p3')->nullable();
            $table->integer('p6')->nullable();
            $table->integer('p12')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_checksheet', function (Blueprint $table) {
            $table->dropColumn('harian');
            $table->dropColumn('p1');
            $table->dropColumn('p3');
            $table->dropColumn('p6');
            $table->dropColumn('p12');
        });
    }
};
