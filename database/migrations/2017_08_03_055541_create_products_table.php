<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('name',255);
            $table->text('description')->nullable();

            $table->unsignedInteger('product_status_id');
            $table->foreign('product_status_id')->references('id')->on('product_statuses');

            $table->unsignedInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories');

            $table->unsignedInteger('product_brand_id');
            $table->foreign('product_brand_id')->references('id')->on('product_brands');

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
        Schema::dropIfExists('products');
    }
}
