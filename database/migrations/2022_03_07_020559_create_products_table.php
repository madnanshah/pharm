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
        if(!Schema::hasTable('products')){
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();
                $table->string('name')->required()->nullable(false);
                $table->string('description')->nullable();
                $table->string('salt')->nullable();
                $table->char('type')->nullable();
                $table->string('grammage')->nullable();
                $table->string('manufacturer')->nullable();
                $table->unsignedBigInteger('product_category_id')->nullable();
                $table->foreign('product_category_id')
                    ->references('id')->on('product_categories');
                $table->unsignedBigInteger('sub_category_id')->nullable();
                $table->foreign('sub_category_id')
                    ->references('id')->on('sub_categories');
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
        Schema::dropIfExists('products');
    }
};
