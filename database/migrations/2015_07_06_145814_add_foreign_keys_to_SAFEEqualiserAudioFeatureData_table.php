<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEEqualiserAudioFeatureDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEEqualiserAudioFeatureData', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEEqualiserAudioFeatureData_ibfk_1')->references('ID')->on('SAFEEqualiserUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEEqualiserAudioFeatureData', function(Blueprint $table)
		{
			$table->dropForeign('SAFEEqualiserAudioFeatureData_ibfk_1');
		});
	}

}
