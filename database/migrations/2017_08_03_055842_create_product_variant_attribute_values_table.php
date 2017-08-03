<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('product_sku',160);
            $table->foreign('product_sku','product_variant_attribute_value_f1')->references('sku')->on('product_variants');

            $table->unsignedInteger('product_attribute_id');
            $table->foreign('product_attribute_id','product_variant_attribute_value_f2')->references('id')->on('product_attributes');

            $table->unsignedInteger('product_attribute_value_id');
            $table->foreign('product_attribute_value_id','product_variant_attribute_value_f3')->references('id')->on('product_attribute_values');

            $table->unsignedInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->unsignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->string('created_at_ip')->nullable()->default(NULL);
            $table->string('updated_at_ip')->nullable()->default(NULL);

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['product_sku', 'product_attribute_id', 'product_attribute_value_id'],'sku_attribute_value_PK');
            $table->unique(['product_sku', 'product_attribute_id'],'sku_attribute_UNIQUE'); // One SKU one Size
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variant_attribute_values');
    }
}
