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
        Schema::table('rindous', function (Blueprint $table) {
            $table->renameColumn('rindous_img_2', 'rindou_img_2');
            $table->renameColumn('rindous_img_3', 'rindou_img_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rindous', function (Blueprint $table) {
            //
        });
    }
};
