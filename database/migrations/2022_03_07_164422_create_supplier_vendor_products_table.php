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
        if(!Schema::hasTable('supplier_vendor_products')){
            Schema::create('supplier_vendor_products', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();

                $table->unsignedBigInteger('supplier_vendor_id');
                $table->foreign('supplier_vendor_id')
                    ->references('id')->on('supplier_vendor');

                $table->unsignedBigInteger('vendor_product_id');
                $table->foreign('vendor_product_id')
                    ->references('id')->on('vendor_products');

                $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('supplier_vendor_products');
    }
};
