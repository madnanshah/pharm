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
        if(!Schema::hasTable('purchase_orders')){
            Schema::create('purchase_orders', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();

                $table->unsignedBigInteger('supplier_vendor_id');
                $table->foreign('supplier_vendor_id')
                    ->references('id')->on('supplier_vendor');

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
        Schema::dropIfExists('purchase_orders');
    }
};
