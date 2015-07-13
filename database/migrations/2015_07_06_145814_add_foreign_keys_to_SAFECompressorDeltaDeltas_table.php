<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFECompressorDeltaDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFECompressorDeltaDeltas', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFECompressorDeltaDeltas_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFECompressorDeltaDeltas', function(Blueprint $table)
		{
			$table->dropForeign('SAFECompressorDeltaDeltas_ibfk_1');
		});
	}

}
