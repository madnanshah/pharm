<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sub_categories')){
            Schema::create('sub_categories', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();
                $table->string('name')->required()->nullable(false);
                $table->unsignedBigInteger('product_category_id');
                $table->foreign('product_category_id')
                    ->references('id')->on('product_categories');
                $table->string('description')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
};