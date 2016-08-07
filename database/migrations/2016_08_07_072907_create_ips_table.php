<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIpsTable extends Migration {

	public function up()
	{
		Schema::create('ips', function(Blueprint $table) {
			$table->increments('id');
			$table->string('ip_address', 15)->unique();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('ips');
	}
}