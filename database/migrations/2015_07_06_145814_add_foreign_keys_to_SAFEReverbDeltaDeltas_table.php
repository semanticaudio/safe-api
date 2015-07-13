<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEReverbDeltaDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEReverbDeltaDeltas', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEReverbDeltaDeltas_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEReverbDeltaDeltas', function(Blueprint $table)
		{
			$table->dropForeign('SAFEReverbDeltaDeltas_ibfk_1');
		});
	}

}
