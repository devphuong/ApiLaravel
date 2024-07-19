<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('product_name');
            $table->text('detailed_description');
            $table->text('short_description');
            $table->decimal('price', 10, 2);
            $table->decimal('promotional_price', 10, 2)->nullable(); 
            $table->string('imgproduct')->nullable(); 
            $table->json('album')->nullable(); 
            $table->string('pdf_file')->nullable();
            $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('products');
    }
}
//php artisan make:migration create_products_table --create=products