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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invitation_id');
            $table->unsignedBigInteger('session_invitation_id');
            $table->string('name');
            $table->integer('quota');
            $table->string('phone', 15);
            $table->string('email')->unique();
            $table->timestamps();

            $table->foreign('invitation_id')->references('id')->on('invitation')->onDelete('cascade');
            $table->foreign('session_invitation_id')->references('id')->on('session_invitation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
