<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportTasksTable extends Migration {

	public function up()
	{
		Schema::create('report_tasks', function(Blueprint $table) {
			$table->increments('report_task_id');
			$table->enum('report_type', array('product', 'category'));
			$table->enum('frequency', array('daily', 'weekly', 'monthly'))->index();
			$table->smallInteger('date')->unsigned()->nullable()->index()->default('1');
			$table->tinyInteger('day')->unsigned()->nullable()->index();
			$table->time('time')->nullable();
			$table->enum('weekday_only', array('yes', 'no'))->nullable();
			$table->enum('delivery_method', array('email', 'sms'));
            $table->enum('status', array('picked', 'queuing', 'running'))->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('report_tasks');
	}
}