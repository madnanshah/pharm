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
            Schema::hasTable('vendor_products') && 
            !Schema::hasColumn('vendor_products','supplier_id')
        ){
            Schema::table('vendor_products', function (Blueprint $table) {
                $table->unsignedBigInteger('supplier_id')->after('vendor_id')->nullable();
                $table->foreign('supplier_id')
                    ->references('id')->on('suppliers');
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
            Schema::hasTable('vendor_products') && 
            Schema::hasColumn('vendor_products','supplier_id')
        ){
            Schema::table('vendor_products', function (Blueprint $table) {
                $table->dropForeign(['supplier_id']);
                $table->dropColumn('supplier_id');
            });
        }
    }
};
