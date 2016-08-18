<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupsTable extends Migration {

	public function up()
	{
		Schema::create('groups', function(Blueprint $table) {
			$table->increments('group_id');
			$table->text('group_name');
			$table->text('website')->nullable();
			$table->text('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('groups');
	}
}