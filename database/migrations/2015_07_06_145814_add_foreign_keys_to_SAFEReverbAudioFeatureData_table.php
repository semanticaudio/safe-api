<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFEReverbAudioFeatureDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFEReverbAudioFeatureData', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFEReverbAudioFeatureData_ibfk_1')->references('ID')->on('SAFEReverbUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFEReverbAudioFeatureData', function(Blueprint $table)
		{
			$table->dropForeign('SAFEReverbAudioFeatureData_ibfk_1');
		});
	}

}
