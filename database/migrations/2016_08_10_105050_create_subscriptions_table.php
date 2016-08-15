<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionsTable extends Migration {

	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table) {
			$table->increments('subscription_id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('api_product_id', 255);
			$table->string('api_customer_id', 255);
			$table->string('api_subscription_id', 255);
			$table->timestamp('expiry_date');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('subscriptions');
	}
}