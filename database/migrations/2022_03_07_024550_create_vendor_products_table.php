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
        if(!Schema::hasTable('vendor_products')){
            Schema::create('vendor_products', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')
                    ->references('id')->on('products');
                $table->unsignedBigInteger('vendor_id');
                $table->foreign('vendor_id')
                    ->references('id')->on('vendors');
                $table->boolean('is_active')->default(false);
                $table->boolean('is_short')->default(false);
                $table->boolean('is_discounted')->default(false);
                $table->boolean('is_controlled')->default(false);
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
        Schema::dropIfExists('vendor_products');
    }
};
