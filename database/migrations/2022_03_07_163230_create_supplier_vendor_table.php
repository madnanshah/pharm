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
        if(!Schema::hasTable('supplier_vendor')){
            Schema::create('supplier_vendor', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();
                $table->unsignedBigInteger('supplier_id');
                $table->foreign('supplier_id')
                    ->references('id')->on('suppliers');
                $table->unsignedBigInteger('vendor_id');
                $table->foreign('vendor_id')
                    ->references('id')->on('vendors');
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
        Schema::dropIfExists('supplier_vendor');
    }
};
