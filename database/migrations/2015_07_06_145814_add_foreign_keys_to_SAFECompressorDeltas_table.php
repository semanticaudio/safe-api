<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFECompressorDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFECompressorDeltas', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFECompressorDeltas_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFECompressorDeltas', function(Blueprint $table)
		{
			$table->dropForeign('SAFECompressorDeltas_ibfk_1');
		});
	}

}
