<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoricalPricesTable extends Migration {

	public function up()
	{
		Schema::create('historical_prices', function(Blueprint $table) {
			$table->increments('price_id');
			$table->integer('crawler_id')->unsigned()->index();
			$table->integer('site_id')->unsigned()->index();
			$table->decimal('price');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('crawled_prices');
	}
}