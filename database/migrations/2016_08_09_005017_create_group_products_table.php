<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupProductsTable extends Migration {

	public function up()
	{
		Schema::create('group_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('group_id')->unsigned()->index();
			$table->integer('product_id')->unsigned()->index();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('group_products');
	}
}