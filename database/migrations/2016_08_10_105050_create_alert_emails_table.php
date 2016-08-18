<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlertEmailsTable extends Migration {

	public function up()
	{
		Schema::create('alert_emails', function(Blueprint $table) {
			$table->increments('alert_email_id');
            $table->integer('alert_id')->unsigned();
            $table->text('alert_email_address');
			$table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('alert_emails');
	}
}