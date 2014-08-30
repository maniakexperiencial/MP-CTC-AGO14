<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historias', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('name');
            $table->string('category');
            $table->string('state');
            $table->text('text');
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
		Schema::drop('historias');
	}

}
