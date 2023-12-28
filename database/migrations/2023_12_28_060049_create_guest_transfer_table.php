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
        Schema::create('guest_transfer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->string('image');
            $table->integer('nominal_transfer');
            $table->string('account_number');
            $table->timestamps();

            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_transfer');
    }
};
