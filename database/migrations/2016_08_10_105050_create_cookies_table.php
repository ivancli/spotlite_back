<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCookiesTable extends Migration {

	public function up()
	{
		Schema::create('cookies', function(Blueprint $table) {
			$table->increments('cookie_id');
			$table->string('cookie_name', 255);
			$table->string('cookie_header', 500);
			$table->binary('cookie_file');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('cookies');
	}
}