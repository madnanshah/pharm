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
        if(
            Schema::hasTable('supplier_vendor_products') && 
            Schema::hasColumn('supplier_vendor_products','supplier_vendor_id'
        )
        ){
            Schema::table('supplier_vendor_products', function (Blueprint $table) {
                $table->dropForeign(['supplier_vendor_id']);
                $table->dropColumn('supplier_vendor_id');
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
        if(
            Schema::hasTable('supplier_vendor_products') && 
            !Schema::hasColumn('supplier_vendor_products','supplier_vendor_id')
        ){
            Schema::table('supplier_vendor_products', function (Blueprint $table) {
                $table->unsignedBigInteger('supplier_vendor_id')->after('second_id')->nullable();
                $table->foreign('supplier_vendor_id')
                    ->references('id')->on('supplier_vendor');
            });
        }
    }
};
