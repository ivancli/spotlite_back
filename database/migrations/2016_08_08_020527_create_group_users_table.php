<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupUsersTable extends Migration {

	public function up()
	{
		Schema::create('group_users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned()->index();
			$table->integer('group_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('group_users');
	}
}