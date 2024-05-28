<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('stock_code')->unique();
            $table->integer('seat')->nullable();
            $table->integer('door')->nullable();
            $table->text('summary');
            $table->longText('description')->nullable();
            $table->text('photo');
            $table->integer('stock')->default(1);
            $table->enum('exit_condition',[1,2,3,4,0])->default(0);
            $table->enum('init_condition',['A','B','C','D','default'])->default('default');
            $table->string('chassis_no')->uniqid();
            $table->enum('dimension',['2wd','4wd','default'])->default('default');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->enum('steering',[0,1]);
            $table->float('price');
            $table->string('reg_date_month');
            $table->string('reg_date_year');
             $table->integer('views')->default(0);
            $table->float('discount')->nullable();
            $table->boolean('is_discount')->nullable()->default(false);
            $table->boolean('is_clearance')->default(false);
            $table->boolean('is_best_offer')->default(false);
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->unsignedBigInteger('millage_id')->nullable();
            $table->foreign('millage_id')->references('id')->on('millages')->onDelete('SET NULL');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('SET NULL');
            $table->unsignedBigInteger('engine_id')->nullable();
            $table->foreign('engine_id')->references('id')->on('engines')->onDelete('SET NULL');
            $table->unsignedBigInteger('fuel_id')->nullable();
            $table->foreign('fuel_id')->references('id')->on('fuel_types')->onDelete('SET NULL');
            $table->unsignedBigInteger('transmission_id')->nullable();
            $table->foreign('transmission_id')->references('id')->on('trans_missions')->onDelete('SET NULL');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('SET NULL');
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('SET NULL');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}