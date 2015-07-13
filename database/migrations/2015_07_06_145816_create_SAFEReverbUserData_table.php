<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSAFEReverbUserDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('SAFEReverbUserData', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Descriptors', 256)->nullable();
			$table->string('usrIP', 256)->nullable();
			$table->integer('numInputs')->nullable();
			$table->integer('numOutputs')->nullable();
			$table->float('Param_DampingFrequency', 10, 0)->nullable();
			$table->float('Param_Density', 10, 0)->nullable();
			$table->float('Param_BandwidthFrequency', 10, 0)->nullable();
			$table->float('Param_Decay', 10, 0)->nullable();
			$table->float('Param_PreDelay', 10, 0)->nullable();
			$table->float('Param_Size', 10, 0)->nullable();
			$table->float('Param_Gain', 10, 0)->nullable();
			$table->float('Param_Mix', 10, 0)->nullable();
			$table->float('Param_EarlyMix', 10, 0)->nullable();
			$table->string('Metadata_Genre', 256)->nullable();
			$table->string('Metadata_Instrument', 256)->nullable();
			$table->string('Metadata_Location', 256)->nullable();
			$table->string('Metadata_Experience', 256)->nullable();
			$table->string('Metadata_Age', 256)->nullable();
			$table->string('Metadata_Language', 256)->nullable();
			$table->char('FeatureChecksum', 32)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('SAFEReverbUserData');
	}

}
