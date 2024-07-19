<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('product_name');
            $table->text('short_description');
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('promotional_price', 10, 2)->nullable();
            $table->decimal('totalAmount', 10, 2)->nullable();
            $table->string('pdf_file')->nullable();
            $table->integer('quantity_bill')->default(0);
            $table->boolean('success')->default(false);
            $table->boolean('unsuccessful')->default(false);
            $table->boolean('approving')->default(false);
            $table->string('full_name'); 
            $table->string('email');
            $table->string('phone_number'); 
            $table->string('address');
            $table->integer('resultCode')->nullable();
            $table->string('signature')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
//php artisan make:migration create_carts_table --create=carts