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
        Schema::create('btc_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('amount');
            $table->string('address');
            $table->string('dest_tag');
            $table->string('txn_id');
            $table->string('confirms_needed');
            $table->string('timeout');
            $table->string('from_currency');
            $table->string('to_currency');
            $table->string('status')->default('initialized');
            $table->string('checkout_url');
            $table->string('status_url');
            $table->string('qrcode_url');
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
        Schema::dropIfExists('btc_payments');
    }
};
