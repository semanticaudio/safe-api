<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEDistortionAudioFeatureDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEDistortionAudioFeatureData', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEDistortionAudioFeatureData_ibfk_1')->references('ID')->on('SAFEDistortionUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEDistortionAudioFeatureData', function(Blueprint $table)
		{
			$table->dropForeign('SAFEDistortionAudioFeatureData_ibfk_1');
		});
	}

}
