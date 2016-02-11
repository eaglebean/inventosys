<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            // Ids
            $table->increments('id');
            $table->string('contpaq_id');
            $table->string('barcode');

            // Info
            $table->integer('footwear_type_id')->default(null); // Tipo de calzado
            $table->string('style');
            $table->text('description');

            // Attributes
            $table->integer('color_id');
            $table->integer('size_id');
            $table->integer('qty_container');
            $table->integer('unit_id');
            $table->boolean('active')->default(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
