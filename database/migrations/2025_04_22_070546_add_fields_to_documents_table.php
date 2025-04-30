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
        Schema::table('documents', function (Blueprint $table) {
            $table->string('program_studi')->nullable();
            $table->string('volume')->nullable();
            $table->string('link_journal')->nullable();
            $table->string('nomor')->nullable();
            $table->date('tanggal_unggah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn(['program_studi', 'volume', 'link_journal', 'nomor', 'tanggal_unggah']);
        });
    }
};
