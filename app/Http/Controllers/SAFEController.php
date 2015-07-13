<?php

namespace App\Http\Controllers;


use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class SAFEController extends BaseController
{
	public function index(){
		return '<img src="http://media.giphy.com/media/13d2jHlSlxklVe/giphy.gif">';
	}

	/**
     * 
 	 * Version 1 - Super Hyper Alpha
     * 
     */
	public function exportPluginID($plugin,$id){
		switch (intval($plugin)) {
			case "SAFECompressorAudioFeatureData":
				return response()->json(\App\SAFECompressorAudioFeatureData::where('ID','=',$id)->get());
				break;
			case "SAFECompressorDeltaDeltas":
				return response()->json(\App\SAFECompressorDeltaDeltas::where('ID','=',$id)->get());
				break;
			case "SAFECompressorDeltas":
				return response()->json(\App\SAFECompressorDeltas::where('ID','=',$id)->get());
				break;
			case "SAFECompressorUserData":
				return response()->json(\App\SAFECompressorUserData::where('ID','=',$id)->get());
				break;
			case "SAFEDistortionAudioFeatureData":
				return response()->json(\App\SAFEDistortionAudioFeatureData::where('ID','=',$id)->get());
				break;
			case "SAFEDistortionDeltaDeltas":
				return response()->json(\App\SAFEDistortionDeltaDeltas::where('ID','=',$id)->get());
				break;
			case "SAFEDistortionDeltas":
				return response()->json(\App\SAFEDistortionDeltas::where('ID','=',$id)->get());
				break;
			case "SAFEDistortionUserData":
				return response()->json(\App\SAFEDistortionUserData::where('ID','=',$id)->get());
				break;
			case "SAFEEqualiserAudioFeatureData":
				return response()->json(\App\SAFEEqualiserAudioFeatureData::where('ID','=',$id)->get());
				break;
			case "SAFEEqualiserDeltaDeltas":
				return response()->json(\App\SAFEEqualiserDeltaDeltas::where('ID','=',$id)->get());
				break;
			case "SAFEEqualiserDeltas":
				return response()->json(\App\SAFEEqualiserDeltas::where('ID','=',$id)->get());
				break;
			case "SAFEEqualiserUserData":
				return response()->json(\App\SAFEEqualiserUserData::where('ID','=',$id)->get());
				break;
			case "SAFEReverbAudioDeltaDeltas":
				return response()->json(\App\SAFEReverbAudioDeltaDeltas::where('ID','=',$id)->get());
				break;
			case "SAFEReverbAudioDeltas":
				return response()->json(\App\SAFEReverbAudioDeltas::where('ID','=',$id)->get());
				break;
			case "SAFEReverbAudioFeatureData":
				return response()->json(\App\SAFEReverbAudioFeatureData::where('ID','=',$id)->get());
				break;
			case "SAFEReverbAudioUserData":
				return response()->json(\App\SAFEReverbAudioUserData::where('ID','=',$id)->get());
				break;
			default:
				return 'That plugin doesn\'t exist bro' ;
				break;
		}
	}
}
