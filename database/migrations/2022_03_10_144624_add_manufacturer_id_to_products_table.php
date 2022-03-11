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
            Schema::hasTable('products') && 
            !Schema::hasColumn('products','manufacturer_id')
        ){
            Schema::table('products', function (Blueprint $table) {
                $table->unsignedBigInteger('manufacturer_id')->after('sub_category_id')->nullable();
                $table->foreign('manufacturer_id')
                    ->references('id')->on('manufacturers');
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
            Schema::hasTable('products') && 
            Schema::hasColumn('products','manufacturer_id'
        )
        ){
            Schema::table('products', function (Blueprint $table) {
                $table->dropForeign(['manufacturer_id']);
                $table->dropColumn('manufacturer_id');
            });
        }
    }
};
