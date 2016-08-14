<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('product_id');
			$table->string('product_name', 255);
			$table->integer('category_id')->unsigned()->nullable()->index();
			$table->integer('product_order')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}