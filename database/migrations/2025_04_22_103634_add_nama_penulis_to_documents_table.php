$table->string('nama_penulis')->nullable();
    $table->dropForeign(['writer_id']);
    $table->dropColumn('writer_id');<?php

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
            $table->string('nama_penulis')->nullable();
            $table->dropForeign(['writer_id']);
            $table->dropColumn('writer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            //
        });
    }
};
