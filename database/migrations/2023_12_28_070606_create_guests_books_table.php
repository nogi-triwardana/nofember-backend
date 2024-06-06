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
        Schema::create('guests_books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreignUuid('invitation_id')->references('id')->on('invitations')->onDelete('cascade');
            $table->string('image');
            $table->string('name');
            $table->integer('temperature_body');
            $table->integer('amount_guests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests_books');
    }
};
