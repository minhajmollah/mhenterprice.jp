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
        Schema::create('accessories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained();
        $table->string('comfort');
        $table->string('other_feature');
        $table->string('selling_point');
        $table->string('safety_measure');
        $table->string('window_type');
        $table->string('other_information');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories');
    }
};
