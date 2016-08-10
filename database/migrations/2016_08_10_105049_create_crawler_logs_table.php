<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrawlerLogsTable extends Migration {

	public function up()
	{
		Schema::create('crawler_logs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('crawler_id')->unsigned()->index();
			$table->enum('status', array('started', 'prepared', 'crawled', 'validated', 'reported', 'finished'))->index();
			$table->string('message', 500)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('crawler_logs');
	}
}