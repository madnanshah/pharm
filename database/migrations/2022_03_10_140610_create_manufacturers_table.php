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
        if(!Schema::hasTable('manufacturers'))
        {
            Schema::create('manufacturers', function (Blueprint $table) {
                $table->id();
                $table->string('second_id')->unique()->nullable();
                $table->string('name')->required()->nullable(false);
                $table->string('address')->nullable();
                $table->string('phone')->nullable();
                $table->string('phone_2')->nullable();
                $table->string('phone_3')->nullable();
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
        Schema::dropIfExists('manufacturers');
    }
};
