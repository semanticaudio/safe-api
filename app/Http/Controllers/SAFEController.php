<?php

namespace App\Http\Controllers;


use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use SoapBox\Formatter\Formatter;

class SAFEController extends BaseController
{
	public function index(){
		return '<img src="http://media.giphy.com/media/13d2jHlSlxklVe/giphy.gif">';
	}

	/**
     * 
 	 * Version 1 - 💣 Super Hyper Alpha 💣
     * 
     */
	public function exportPluginID($plugin,$id,$format){
			switch ($plugin) {
				case "SAFECompressor":
					$deltas = \App\SAFECompressorUserData::find($id)->deltas;
					$deltadeltas = \App\SAFECompressorUserData::find($id)->deltadeltas;
					$audiofeaturedata = \App\SAFECompressorUserData::find($id)->audiofeaturedata;
					$userdata = \App\SAFECompressorUserData::find($id);
					break;
				case "SAFEDistortion":
					$deltas = \App\SAFEDistortionUserData::find($id)->deltas;
					$deltadeltas = \App\SAFEDistortionUserData::find($id)->deltadeltas;
					$audiofeaturedata = \App\SAFEDistortionUserData::find($id)->audiofeaturedata;
					$userdata = \App\SAFEDistortionUserData::find($id);
					break;
				case "SAFEEqualiser":
					$deltas = \App\SAFEEqualiserUserData::find($id)->deltas;
					$deltadeltas = \App\SAFEEqualiserUserData::find($id)->deltadeltas;
					$audiofeaturedata = \App\SAFEEqualiserUserData::find($id)->audiofeaturedata;
					$userdata = \App\SAFEEqualiserUserData::find($id);
					break;
				case "SAFEReverb":
					$deltas = \App\SAFEReverbUserData::find($id)->deltas;
					$deltadeltas = \App\SAFEReverbUserData::find($id)->deltadeltas;
					$audiofeaturedata = \App\SAFEReverbUserData::find($id)->audiofeaturedata;
					$userdata = \App\SAFEReverbUserData::find($id);
					break;
				default:
					return 'That plugin doesn\'t exist bro' ;
					break;
			}
		$resultarray = [
			'userdata' => $userdata,
			"deltas" => [
				"processed" => $deltas->filter(function($item){
				    return $item->isProcessed();
				})->values()->values(),
				"unprocessed" => $deltas->filter(function($item){
				    return !$item->isProcessed();
				})->values()->values()
			],
			"deltadeltas" => [
				"processed" => $deltadeltas->filter(function($item){
				    return $item->isProcessed();
				})->values()->values(),
				"unprocessed" => $deltadeltas->filter(function($item){
				    return !$item->isProcessed();
				})->values()->values()
			],
			"audiofeaturedata" => [
				"processed" => $audiofeaturedata->filter(function($item){
				    return $item->isProcessed();
				})->values()->values(),
				"unprocessed" => $audiofeaturedata->filter(function($item){
				    return !$item->isProcessed();
				})->values()->values()
			]
		];

		switch ($format) {
			case 'json':
				return json_encode($resultarray);
				break;
			case 'xml':
				$formatter = Formatter::make(json_encode($resultarray), Formatter::JSON);
				return response($formatter->toXml(),'200')->header('Content-Type', 'text/xml');
				break;
			case 'matlab':
				return json_encode($json_array);
				break;
		}
	}
}
