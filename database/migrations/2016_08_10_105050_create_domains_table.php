<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainsTable extends Migration {

	public function up()
	{
		Schema::create('domains', function(Blueprint $table) {
			$table->increments('domain_id');
			$table->string('domain_url', 253)->unique();
			$table->text('domain_name')->nullable();
			$table->text('domain_xpath')->nullable();
			$table->text('crawler_class')->nullable();
			$table->text('parser_class')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('domains');
	}
}