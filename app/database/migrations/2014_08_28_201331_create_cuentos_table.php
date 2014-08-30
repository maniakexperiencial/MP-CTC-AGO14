<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('name');
            $table->string('category');
            $table->integer('age');

            $table->string('state');
            $table->string('text');
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
		Schema::drop('cuentos');
	}

}
