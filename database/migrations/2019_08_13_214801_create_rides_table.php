<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cost')->nullable();
            $table->string('start_address');
            $table->string('start_latitude');
            $table->string('start_longitude');
            $table->string('destination_address')->nullable();
            $table->string('destination_latitude')->nullable();
            $table->string('destination_longitude')->nullable();
            $table->string('stops')->nullable();
            $table->string('distance')->nullable();
            $table->integer('duration')->nullable();
            $table->text('cancel_reason')->nullable();
            $table->string('payment_type')->default('card');
            $table->string('status')->default('pending');
            $table->integer('coupon_id')->nullable();
            $table->integer('user_id');
            $table->integer('driver_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
