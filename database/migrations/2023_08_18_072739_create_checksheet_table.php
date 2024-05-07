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
        Schema::create('checksheet', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kereta');
            $table->integer('id_user');
            $table->integer('id_approve_assman')->nullable();
            $table->integer('id_approve_upt')->nullable();
            $table->dateTime('date_time');
            $table->string('no_kereta');
            $table->string('tipe');
            $table->string('jam_engine');
            $table->integer('is_so')->nullable();
            $table->integer('is_approve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checksheet');
    }
};
