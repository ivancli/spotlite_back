<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportLogsTable extends Migration {

	public function up()
	{
		Schema::create('report_logs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('task_id')->unsigned();
			$table->enum('status', array('started', 'prepared', 'validated', 'generated', 'saved'));
			$table->string('message', 500)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('report_logs');
	}
}