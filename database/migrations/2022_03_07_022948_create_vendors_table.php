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
        if(!Schema::hasTable('vendors')){
            Schema::create('vendors', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();
                $table->string('name')->required()->nullable(false);
                $table->string('description')->nullable();
                $table->string('address')->nullable();
                $table->string('location')->nullable();
                $table->string('area')->nullable();
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
        Schema::dropIfExists('vendors');
    }
};
