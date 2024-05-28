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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('drive_type')->nullable();;
            $table->integer('mfg_year_from')->nullable();;
            $table->integer('mfg_year_to')->nullable();;
            $table->decimal('price_from', 10, 2)->nullable();;
            $table->decimal('price_to', 10, 2)->nullable();;
            $table->string('currency')->nullable();;
            $table->string('name');
            $table->string('name_prefix')->nullable();
            $table->string('email');
            $table->text('message');
            $table->string('country')->nullable();;
            $table->string('telephone')->nullable();;
            $table->string('email_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};