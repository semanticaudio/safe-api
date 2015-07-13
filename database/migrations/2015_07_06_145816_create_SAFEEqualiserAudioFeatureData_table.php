<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSAFEEqualiserAudioFeatureDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('SAFEEqualiserAudioFeatureData', function(Blueprint $table)
		{
			$table->integer('ID')->default(0);
			$table->integer('ChannelNumber')->default(0);
			$table->integer('FrameNumber')->default(0);
			$table->string('SignalState', 256)->default('');
			$table->float('DataMean', 10, 0)->nullable();
			$table->float('Variance', 10, 0)->nullable();
			$table->float('Standard_Deviation', 10, 0)->nullable();
			$table->float('RMS_Amplitude', 10, 0)->nullable();
			$table->float('Zero_Crossing_Rate', 10, 0)->nullable();
			$table->float('Spectral_Centroid', 10, 0)->nullable();
			$table->float('Spectral_Variance', 10, 0)->nullable();
			$table->float('Spectral_Standard_Deviation', 10, 0)->nullable();
			$table->float('Spectral_Skewness', 10, 0)->nullable();
			$table->float('Spectral_Kurtosis', 10, 0)->nullable();
			$table->float('Irregularity_J', 10, 0)->nullable();
			$table->float('Irregularity_K', 10, 0)->nullable();
			$table->float('Fundamental', 10, 0)->nullable();
			$table->float('Smoothness', 10, 0)->nullable();
			$table->float('Spectral_Roll_Off', 10, 0)->nullable();
			$table->float('Spectral_Flatness', 10, 0)->nullable();
			$table->float('Tonality', 10, 0)->nullable();
			$table->float('Spectral_Crest', 10, 0)->nullable();
			$table->float('Spectral_Slope', 10, 0)->nullable();
			$table->float('Peak_Spectral_Centroid', 10, 0)->nullable();
			$table->float('Peak_Spectral_Variance', 10, 0)->nullable();
			$table->float('Peak_Spectral_Standard_Deviation', 10, 0)->nullable();
			$table->float('Peak_Spectral_Skewness', 10, 0)->nullable();
			$table->float('Peak_Spectral_Kurtosis', 10, 0)->nullable();
			$table->float('Peak_Irregularity_J', 10, 0)->nullable();
			$table->float('Peak_Irregularity_K', 10, 0)->nullable();
			$table->float('Peak_Tristimulus_1', 10, 0)->nullable();
			$table->float('Peak_Tristimulus_2', 10, 0)->nullable();
			$table->float('Peak_Tristimulus_3', 10, 0)->nullable();
			$table->float('Inharmonicity', 10, 0)->nullable();
			$table->float('Harmonic_Spectral_Centroid', 10, 0)->nullable();
			$table->float('Harmonic_Spectral_Variance', 10, 0)->nullable();
			$table->float('Harmonic_Spectral_Standard_Deviation', 10, 0)->nullable();
			$table->float('Harmonic_Spectral_Skewness', 10, 0)->nullable();
			$table->float('Harmonic_Spectral_Kurtosis', 10, 0)->nullable();
			$table->float('Harmonic_Irregularity_J', 10, 0)->nullable();
			$table->float('Harmonic_Irregularity_K', 10, 0)->nullable();
			$table->float('Harmonic_Tristimulus_1', 10, 0)->nullable();
			$table->float('Harmonic_Tristimulus_2', 10, 0)->nullable();
			$table->float('Harmonic_Tristimulus_3', 10, 0)->nullable();
			$table->float('Noisiness', 10, 0)->nullable();
			$table->float('Parity_Ratio', 10, 0)->nullable();
			$table->float('Bark_Coefficient_0', 10, 0)->nullable();
			$table->float('Bark_Coefficient_1', 10, 0)->nullable();
			$table->float('Bark_Coefficient_2', 10, 0)->nullable();
			$table->float('Bark_Coefficient_3', 10, 0)->nullable();
			$table->float('Bark_Coefficient_4', 10, 0)->nullable();
			$table->float('Bark_Coefficient_5', 10, 0)->nullable();
			$table->float('Bark_Coefficient_6', 10, 0)->nullable();
			$table->float('Bark_Coefficient_7', 10, 0)->nullable();
			$table->float('Bark_Coefficient_8', 10, 0)->nullable();
			$table->float('Bark_Coefficient_9', 10, 0)->nullable();
			$table->float('Bark_Coefficient_10', 10, 0)->nullable();
			$table->float('Bark_Coefficient_11', 10, 0)->nullable();
			$table->float('Bark_Coefficient_12', 10, 0)->nullable();
			$table->float('Bark_Coefficient_13', 10, 0)->nullable();
			$table->float('Bark_Coefficient_14', 10, 0)->nullable();
			$table->float('Bark_Coefficient_15', 10, 0)->nullable();
			$table->float('Bark_Coefficient_16', 10, 0)->nullable();
			$table->float('Bark_Coefficient_17', 10, 0)->nullable();
			$table->float('Bark_Coefficient_18', 10, 0)->nullable();
			$table->float('Bark_Coefficient_19', 10, 0)->nullable();
			$table->float('Bark_Coefficient_20', 10, 0)->nullable();
			$table->float('Bark_Coefficient_21', 10, 0)->nullable();
			$table->float('Bark_Coefficient_22', 10, 0)->nullable();
			$table->float('Bark_Coefficient_23', 10, 0)->nullable();
			$table->float('Bark_Coefficient_24', 10, 0)->nullable();
			$table->float('MFCC_0', 10, 0)->nullable();
			$table->float('MFCC_1', 10, 0)->nullable();
			$table->float('MFCC_2', 10, 0)->nullable();
			$table->float('MFCC_3', 10, 0)->nullable();
			$table->float('MFCC_4', 10, 0)->nullable();
			$table->float('MFCC_5', 10, 0)->nullable();
			$table->float('MFCC_6', 10, 0)->nullable();
			$table->float('MFCC_7', 10, 0)->nullable();
			$table->float('MFCC_8', 10, 0)->nullable();
			$table->float('MFCC_9', 10, 0)->nullable();
			$table->float('MFCC_10', 10, 0)->nullable();
			$table->float('MFCC_11', 10, 0)->nullable();
			$table->float('MFCC_12', 10, 0)->nullable();
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
		Schema::drop('SAFEEqualiserAudioFeatureData');
	}

}
