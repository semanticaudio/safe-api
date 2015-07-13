<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEDistortionDeltaDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEDistortionDeltaDeltas', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEDistortionDeltaDeltas_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEDistortionDeltaDeltas', function(Blueprint $table)
		{
			$table->dropForeign('SAFEDistortionDeltaDeltas_ibfk_1');
		});
	}

}
