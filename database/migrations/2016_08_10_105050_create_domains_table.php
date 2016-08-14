<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainsTable extends Migration {

	public function up()
	{
		Schema::create('domains', function(Blueprint $table) {
			$table->increments('domain_id');
			$table->string('domain_url', 253)->unique();
			$table->string('domain_name', 255)->nullable();
			$table->string('domain_xpath', 255)->nullable();
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