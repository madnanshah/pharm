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
        if(Schema::hasTable('users') && !Schema::hasColumn('users','vendor_id')){
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('vendor_id')->after('email_verified_at')->nullable();
                $table->foreign('vendor_id')
                    ->references('id')->on('vendors');
                $table->boolean('is_admin')->after('vendor_id')->default(false);
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
        if(Schema::hasTable('users')  && Schema::hasColumn('users','vendor_id')){
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['vendor_id']);
                $table->dropColumn('vendor_id');
                $table->dropColumn('is_admin');
            });
        }
    }
};
