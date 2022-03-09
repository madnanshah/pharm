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
        if(!Schema::hasTable('grn')){
            Schema::create('grn', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();

                $table->unsignedBigInteger('po_id');
                $table->foreign('po_id')
                    ->references('id')->on('purchase_orders');

                $table->string('invoice_number')->nullable();
                $table->timestamp('invoice_date')->nullable();

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
        Schema::dropIfExists('grn');
    }
};
