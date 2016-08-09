<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('brand_id')->references('id')->on('brands')
						->onDelete('restrict')
						->onUpdate('no action');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('crawled_prices', function(Blueprint $table) {
			$table->foreign('crawler_id')->references('id')->on('crawlers')
						->onDelete('restrict')
						->onUpdate('no action');
		});
		Schema::table('crawled_prices', function(Blueprint $table) {
			$table->foreign('site_id')->references('id')->on('sites')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('crawlers', function(Blueprint $table) {
			$table->foreign('site_id')->references('id')->on('sites')
						->onDelete('restrict')
						->onUpdate('no action');
		});
		Schema::table('crawlers', function(Blueprint $table) {
			$table->foreign('cookie_id')->references('id')->on('cookies')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('crawler_ips', function(Blueprint $table) {
			$table->foreign('crawler_id')->references('id')->on('crawlers')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('crawler_ips', function(Blueprint $table) {
			$table->foreign('ip_id')->references('id')->on('ips')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('crawler_logs', function(Blueprint $table) {
			$table->foreign('crawler_id')->references('id')->on('crawlers')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('group_users', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('group_users', function(Blueprint $table) {
			$table->foreign('group_id')->references('id')->on('groups')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('group_products', function(Blueprint $table) {
			$table->foreign('group_id')->references('id')->on('groups')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('group_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('user_products', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('user_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_brand_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->dropForeign('sites_product_id_foreign');
		});
		Schema::table('crawled_prices', function(Blueprint $table) {
			$table->dropForeign('crawled_prices_crawler_id_foreign');
		});
		Schema::table('crawled_prices', function(Blueprint $table) {
			$table->dropForeign('crawled_prices_site_id_foreign');
		});
		Schema::table('crawlers', function(Blueprint $table) {
			$table->dropForeign('crawlers_site_id_foreign');
		});
		Schema::table('crawlers', function(Blueprint $table) {
			$table->dropForeign('crawlers_cookie_id_foreign');
		});
		Schema::table('crawler_ips', function(Blueprint $table) {
			$table->dropForeign('crawler_ips_crawler_id_foreign');
		});
		Schema::table('crawler_ips', function(Blueprint $table) {
			$table->dropForeign('crawler_ips_ip_id_foreign');
		});
		Schema::table('crawler_logs', function(Blueprint $table) {
			$table->dropForeign('crawler_logs_crawler_id_foreign');
		});
		Schema::table('group_users', function(Blueprint $table) {
			$table->dropForeign('group_users_user_id_foreign');
		});
		Schema::table('group_users', function(Blueprint $table) {
			$table->dropForeign('group_users_group_id_foreign');
		});
		Schema::table('group_products', function(Blueprint $table) {
			$table->dropForeign('group_products_group_id_foreign');
		});
		Schema::table('group_products', function(Blueprint $table) {
			$table->dropForeign('group_products_product_id_foreign');
		});
		Schema::table('user_products', function(Blueprint $table) {
			$table->dropForeign('user_products_user_id_foreign');
		});
		Schema::table('user_products', function(Blueprint $table) {
			$table->dropForeign('user_products_product_id_foreign');
		});
	}
}