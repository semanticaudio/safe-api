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
     * GET
     * 
     * $plugin string
     * $format string
     * 
     * POST
     * 
     * descriptors - Array of Strings
     */
	public function exportPluginID($plugin,$format, Request $request){
		ini_set('memory_limit','-1');
		header('Access-Control-Allow-Origin: *');
	    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
	    header('Access-Control-Allow-Credentials: true');
		$terms = json_decode($request->input('terms', null));
		$ids = array();
		$result = array();
		foreach ($terms as $term) {
			switch ($plugin) {
				case "SAFECompressor":
					foreach (\App\SAFECompressorUserData::where('Descriptors','LIKE',$term)->take(5)->get() as $termobj) {
						array_push($ids,$termobj->ID);
					}
					unset($termobj);
					break;
				case "SAFEDistortion":
					foreach (\App\SAFEDistortionUserData::where('Descriptors','LIKE',$term)->take(5)->get() as $termobj) {
						array_push($ids,$termobj->ID);
					}
					unset($termobj);
					break;
				case "SAFEEqualiser":
					foreach (\App\SAFEEqualiserUserData::where('Descriptors','LIKE',$term)->take(5)->get() as $termobj) {
						array_push($ids,$termobj->ID);
					}
					unset($termobj);
					break;
				case "SAFEReverb":
					foreach (\App\SAFEReverbUserData::where('Descriptors','LIKE',$term)->take(5)->get() as $termobj) {
						array_push($ids,$termobj->ID);
					}
					unset($termobj);
					break;
				default:
					return 'That plugin doesn\'t exist bro' ;
					break;
			}
		}
		foreach ($ids as $id) {
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
			$temp = [
				'ID' => $id,
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
			array_push($result,$temp);
			unset($temp);
			unset($deltas);
			unset($deltadeltas);
			unset($audiofeaturedata);
			unset($userdata);
		}
		unset($ids);
		switch ($format) {
			case 'json':
				return response(json_encode($result),'200')->header('Content-Type', 'application/json');
				break;
			case 'xml':
				$formatter = Formatter::make(json_encode($result), Formatter::JSON);
				return response($formatter->toXml(),'200')->header('Content-Type', 'text/xml');
				break;
			case 'csv':
				$formatter = Formatter::make($result, Formatter::ARR);
				return response($formatter->toCsv(),'200');
				break;
		}
	}
}
