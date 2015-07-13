<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEDistortionDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEDistortionDeltas', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEDistortionDeltas_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEDistortionDeltas', function(Blueprint $table)
		{
			$table->dropForeign('SAFEDistortionDeltas_ibfk_1');
		});
	}

}
