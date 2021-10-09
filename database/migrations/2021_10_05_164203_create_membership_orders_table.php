<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('membership_id')->nullable();
            $table->integer('membership_products_id')->nullable();
            $table->integer('status')->default(1);
            $table->string('payment_method')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('sender_account_number')->nullable();
            $table->string('transection_id')->nullable();
            $table->integer('paid')->default(0);
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
        Schema::dropIfExists('membership_orders');
    }
}
