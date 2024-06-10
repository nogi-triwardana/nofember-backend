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
        Schema::table('invitations', function (Blueprint $table) {
            $table->string('akad_time')->after('akad_date');
            $table->string('akad_address')->after('akad_time');
            $table->string('akad_location')->after('akad_address');
            $table->string('resepsi_time')->after('resepsi_date');
            $table->string('resepsi_address')->after('resepsi_time');
            $table->string('resepsi_location')->after('resepsi_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitation', function (Blueprint $table) {
            $table->dropColumn('akad_time');
            $table->dropColumn('akad_address');
            $table->dropColumn('akad_location');
            $table->dropColumn('resepsi_time');
            $table->dropColumn('resepsi_address');
            $table->dropColumn('resepsi_location');
        });
    }
};
