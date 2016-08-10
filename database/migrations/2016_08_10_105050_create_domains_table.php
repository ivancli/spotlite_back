<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainsTable extends Migration {

	public function up()
	{
		Schema::create('domains', function(Blueprint $table) {
			$table->increments('id');
			$table->string('url', 253)->unique();
			$table->string('name', 255)->nullable();
			$table->string('xpath', 255)->nullable();
			$table->string('crawler_class', 255)->nullable();
			$table->string('parser_class', 255)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('domains');
	}
}