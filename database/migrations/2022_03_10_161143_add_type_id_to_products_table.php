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
            !Schema::hasColumn('products','type_id')
        ){
            Schema::table('products', function (Blueprint $table) {
                $table->unsignedBigInteger('type_id')->after('salt')->nullable();
                $table->foreign('type_id')
                    ->references('id')->on('product_types');
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
            Schema::hasColumn('products','type_id'
        )
        ){
            Schema::table('products', function (Blueprint $table) {
                $table->dropForeign(['type_id']);
                $table->dropColumn('type_id');
            });
        }
    }
};
