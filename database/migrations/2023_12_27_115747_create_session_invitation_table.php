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
        Schema::create('session_invitations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('invitation_id')->references('id')->on('invitations')->onDelete('cascade');
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('session_name');
            $table->dateTimeTz('akad_time');
            $table->dateTimeTz('resepsi_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_invitation');
    }
};
