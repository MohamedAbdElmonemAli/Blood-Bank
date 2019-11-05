<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('about_app');
			$table->string('phone');
			$table->string('email');
			$table->string('fb_link')->nullable();
			$table->string('tw_link')->nullable();
			$table->string('yt_link')->nullable();
			$table->string('ins_link')->nullable();
			$table->string('whats_link')->nullable();
			$table->string('google_link')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}