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
        if(!Schema::hasTable('grn_items')){
            Schema::create('grn_items', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();

                $table->unsignedBigInteger('grn_id');
                $table->foreign('grn_id')
                    ->references('id')->on('grn');

                $table->integer('boxes')->required()->nullable(false)->default(0);
                $table->integer('cases')->required()->nullable(false)->default(0);
                $table->integer('pieces')->required()->nullable(false)->default(0);

                $table->unsignedBigInteger('supplier_vendor_product_id');
                $table->foreign('supplier_vendor_product_id')
                    ->references('id')->on('supplier_vendor_products');

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
        Schema::dropIfExists('grn_items');
    }
};
