<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('package_id')->nullable();
            $table->integer('guest_no')->nullable();
            $table->date('booking_date')->nullable();
            $table->integer('totalprice')->nullable();
            $table->string('booking_remark');
            $table->integer('status')->nullable()->default(0);
            $table->integer('create_user_id')->nullable()->default(0);
            $table->integer('updated_user_id')->nullable();
            $table->integer('deleted_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
