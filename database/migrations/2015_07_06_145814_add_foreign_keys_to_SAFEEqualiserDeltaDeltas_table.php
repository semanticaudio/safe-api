<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEEqualiserDeltaDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEEqualiserDeltaDeltas', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEEqualiserDeltaDeltas_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEEqualiserDeltaDeltas', function(Blueprint $table)
		{
			$table->dropForeign('SAFEEqualiserDeltaDeltas_ibfk_1');
		});
	}

}
