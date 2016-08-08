<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrawlersTable extends Migration {

	public function up()
	{
		Schema::create('crawlers', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('site_id')->unsigned()->index();
			$table->integer('cookie_id')->unsigned()->nullable()->index();
            $table->time('active_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('crawlers');
	}
}