<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSAFEEqualiserUserDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('SAFEEqualiserUserData', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Descriptors', 256)->nullable();
			$table->string('usrIP', 256)->nullable();
			$table->integer('numInputs')->nullable();
			$table->integer('numOutputs')->nullable();
			$table->float('Param_Band1Gain', 10, 0)->nullable();
			$table->float('Param_Band1Frequency', 10, 0)->nullable();
			$table->float('Param_Band2Gain', 10, 0)->nullable();
			$table->float('Param_Band2Frequency', 10, 0)->nullable();
			$table->float('Param_Band2QFactor', 10, 0)->nullable();
			$table->float('Param_Band3Gain', 10, 0)->nullable();
			$table->float('Param_Band3Frequency', 10, 0)->nullable();
			$table->float('Param_Band3QFactor', 10, 0)->nullable();
			$table->float('Param_Band4Gain', 10, 0)->nullable();
			$table->float('Param_Band4Frequency', 10, 0)->nullable();
			$table->float('Param_Band4QFactor', 10, 0)->nullable();
			$table->float('Param_Band5Gain', 10, 0)->nullable();
			$table->float('Param_Band5Frequency', 10, 0)->nullable();
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
		Schema::drop('SAFEEqualiserUserData');
	}

}
