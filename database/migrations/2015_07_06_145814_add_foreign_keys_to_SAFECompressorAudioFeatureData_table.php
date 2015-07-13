<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSAFECompressorAudioFeatureDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('SAFECompressorAudioFeatureData', function(Blueprint $table)
		{
			$table->foreign('ID', 'SAFECompressorAudioFeatureData_ibfk_1')->references('ID')->on('SAFECompressorUserData')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('SAFECompressorAudioFeatureData', function(Blueprint $table)
		{
			$table->dropForeign('SAFECompressorAudioFeatureData_ibfk_1');
		});
	}

}
