<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 128);
			$table->string('last_name_1', 128);
			$table->string('last_name_2', 128);
            $table->boolean('receive_emails');
            $table->string('telephone', 16);
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();

		});

		Schema::create('account_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
            $table->char('type');
			$table->dateTime('sign_up_date');
			$table->dateTime('expiration_date');
            $table->string('status', 64);
			$table->timestamps();
		});

        Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('account_detail_id');
            $table->string('type', 128);
            $table->string('transaction_identifier', 128);
            $table->string('status', 64);
            $table->double('amount');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('payments');
        Schema::drop('account_details');
		Schema::drop('users');
	}

}
