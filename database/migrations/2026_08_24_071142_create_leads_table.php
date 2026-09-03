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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 20);
            $table->string('referral_code', 10)->nullable();
            $table->string('city', 100);
            $table->string('package', 100);
            $table->string('duration', 100);
            $table->date('date');
            $table->string('room_type', 100);
            $table->string('notes', 255)->nullable();
            $table->enum('status', ['new', 'contacted', 'confirmed', 'cancelled'])->default('new');
            $table->foreign('referral_code')->references('referral_code')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
