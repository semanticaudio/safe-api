<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSAFEDistortionDeltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('SAFEDistortionDeltas', function(Blueprint $table)
		{
			$table->integer('ID')->default(0);
			$table->integer('ChannelNumber')->default(0);
			$table->integer('FrameNumber')->default(0);
			$table->string('SignalState', 256)->default('');
			$table->float('Delta_MFCC_0', 10, 0)->nullable();
			$table->float('Delta_MFCC_1', 10, 0)->nullable();
			$table->float('Delta_MFCC_2', 10, 0)->nullable();
			$table->float('Delta_MFCC_3', 10, 0)->nullable();
			$table->float('Delta_MFCC_4', 10, 0)->nullable();
			$table->float('Delta_MFCC_5', 10, 0)->nullable();
			$table->float('Delta_MFCC_6', 10, 0)->nullable();
			$table->float('Delta_MFCC_7', 10, 0)->nullable();
			$table->float('Delta_MFCC_8', 10, 0)->nullable();
			$table->float('Delta_MFCC_9', 10, 0)->nullable();
			$table->float('Delta_MFCC_10', 10, 0)->nullable();
			$table->float('Delta_MFCC_11', 10, 0)->nullable();
			$table->float('Delta_MFCC_12', 10, 0)->nullable();
			$table->primary(['ID','ChannelNumber','FrameNumber','SignalState']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('SAFEDistortionDeltas');
	}

}
