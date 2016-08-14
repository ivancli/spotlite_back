<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupsTable extends Migration {

	public function up()
	{
		Schema::create('groups', function(Blueprint $table) {
			$table->increments('group_id');
			$table->string('group_name', 255);
			$table->string('website', 253)->nullable();
			$table->string('description', 500)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('groups');
	}
}