<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMomoPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('momo_payments', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->nullable();
            $table->string('orderType')->nullable();
            $table->string('transId')->nullable();
            $table->integer('resultCode')->nullable();
            $table->string('payType')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('momo_payments');
    }
}

//php artisan make:migration create_MomoPayments_table --create=momo_payments