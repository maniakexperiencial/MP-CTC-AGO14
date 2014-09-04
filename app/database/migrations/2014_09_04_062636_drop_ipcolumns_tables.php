<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropIpcolumnsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('likes', function($table)
        {
            $table->dropColumn('ip');
        });
        Schema::table('views', function($table)
        {
            $table->dropColumn('ip');
        });

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('likes', function($table)
        {
            $table->text('ip');
        });
        Schema::table('views', function($table)
        {
            $table->text('ip');
        });

	}

}
