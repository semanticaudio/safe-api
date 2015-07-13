<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEReverbDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEReverbDeltas', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEReverbDeltas_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEReverbDeltas', function(Blueprint $table)
		{
			$table->dropForeign('SAFEReverbDeltas_ibfk_1');
		});
	}

}
