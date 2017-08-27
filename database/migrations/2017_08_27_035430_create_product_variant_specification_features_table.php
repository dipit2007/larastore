<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSpecificationFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_specification_features', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('product_sku',160);
            $table->foreign('product_sku','product_variant_specification_sku_f1')->references('sku')->on('product_variants');

            $table->unsignedBigInteger('product_variant_id');
            $table->foreign('product_variant_id','product_variant_specification_id_f1')->references('id')->on('product_variants');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->string('title');
            $table->text('description');
            //$table->string('filepath');

            $table->tinyInteger('product_variant_specification_status')->default(0);

            $table->unsignedInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->unsignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->string('created_at_ip')->nullable()->default(NULL);
            $table->string('updated_at_ip')->nullable()->default(NULL);

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
        Schema::dropIfExists('product_specification_features');
    }
}
