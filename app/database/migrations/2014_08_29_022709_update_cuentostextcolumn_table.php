<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateCuentostextcolumnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cuentos', function(Blueprint $table)
		{
            $table->text('text')->after('state');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cuentos', function(Blueprint $table)
		{
            $table->dropColumn('text');
		});
	}

}
