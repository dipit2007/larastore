<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->unsignedInteger('product_attribute_id');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes');

            $table->string('attributevalue',150);
            $table->string('description',255)->nullable();

            $table->tinyInteger('status')->default(0);

            $table->unsignedInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->unsignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->string('created_at_ip')->nullable()->default(NULL);
            $table->string('updated_at_ip')->nullable()->default(NULL);

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['product_attribute_id', 'attributevalue'],'unique_attributevalue_per_attribute_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_values');
    }
}
