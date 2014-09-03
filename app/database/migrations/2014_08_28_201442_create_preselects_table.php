<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreselectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preselects', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('document_id');
            $table->integer('type');//0 cuento, 1 historia
            $table->float('eval1');
            $table->float('eval2');
            $table->float('eval3');
            $table->float('average');
            $table->integer('status');
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
		Schema::drop('preselects');
	}

}
