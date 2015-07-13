<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEEqualiserDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEEqualiserDeltas', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEEqualiserDeltas_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEEqualiserDeltas', function(Blueprint $table)
		{
			$table->dropForeign('SAFEEqualiserDeltas_ibfk_1');
		});
	}

}
