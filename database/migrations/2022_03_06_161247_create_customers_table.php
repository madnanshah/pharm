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
        if(!Schema::hasTable('customers')){
            Schema::create('customers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('second_id')->unique()->nullable();
                $table->string('first_name')->required()->nullable(false);
                $table->string('last_name')->required()->nullable(false);
                $table->string('phone')->unique()->nullable(false);
                $table->string('email')->unique()->nullable();
                $table->string('password')->nullable(false);
                $table->timestamp('email_verified_at')->nullable();
                $table->timestamp('member_since')->nullable();
                $table->timestamp('date_of_birth')->nullable();
                $table->char('gender', 1)->nullable();
                $table->string('address')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
