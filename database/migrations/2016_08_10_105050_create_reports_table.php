<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration {

	public function up()
	{
		Schema::create('reports', function(Blueprint $table) {
			$table->increments('report_id');
			$table->integer('report_task_id')->unsigned()->index();
//			$table->binary('content')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
		DB::statement("ALTER TABLE reports ADD content MEDIUMBLOB");
	}

	public function down()
	{
		Schema::drop('reports');
	}
}