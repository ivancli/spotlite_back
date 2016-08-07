<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrawledPricesTable extends Migration {

	public function up()
	{
		Schema::create('crawled_prices', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('crawler_id')->unsigned()->index();
			$table->timestamps();
			$table->integer('site_id')->unsigned()->index();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('crawled_prices');
	}
}