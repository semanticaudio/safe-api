<?php

namespace App\Http\Controllers;


use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use SoapBox\Formatter\Formatter;

class SAFEController extends BaseController{
	public function index(){
		return '<img src="http://media.giphy.com/media/13d2jHlSlxklVe/giphy.gif">';
	}

	/**
     * 
 	 * listUserData retrieves the userdata for the requested terms
 	 * You can use the IDs we return to get more info on that specific term
     * 
     * GET
     * 
     * $plugin string
     * $format string
     * 
     * POST
     * 
     * terms - Array of Strings
     * sneakpeak - Boolean (it retrieves all the info in 5 )
     */
	public function listUserData($plugin,$format, Request $request){
		ini_set('memory_limit','-1');
		header('Access-Control-Allow-Origin: *');
	    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
	    header('Access-Control-Allow-Credentials: true');
	    $ids = array();
		$result = array();
		if($request->input('terms') == 'all'){
			$terms = 'all';
			switch ($plugin) {
				case "SAFECompressor":
					// $deltas = \App\SAFECompressorUserData::find($id)->deltas;
					// $deltadeltas = \App\SAFECompressorUserData::find($id)->deltadeltas;
					// $audiofeaturedata = \App\SAFECompressorUserData::find($id)->audiofeaturedata;
					foreach (\App\SAFECompressorUserData::all() as $obj) {
						$temp = [
							'ID' => $obj->ID,
							'userdata' => $obj,
							// "deltas" => [
							// 	"processed" => $deltas->filter(function($item){
							// 	    return $item->isProcessed();
							// 	})->values()->values(),
							// 	"unprocessed" => $deltas->filter(function($item){
							// 	    return !$item->isProcessed();
							// 	})->values()->values()
							// ],
							// "deltadeltas" => $deltadeltas,
							// "audiofeaturedata" => [
							// 	"processed" => $audiofeaturedata->filter(function($item){
							// 	    return $item->isProcessed();
							// 	})->values()->values(),
							// 	"unprocessed" => $audiofeaturedata->filter(function($item){
							// 	    return !$item->isProcessed();
							// 	})->values()->values()
							// ]
						];
						array_push($result,$temp);
						unset($temp);
					}
					break;
				case "SAFEDistortion":
					// $deltas = \App\SAFEDistortionUserData::find($id)->deltas;
					// $deltadeltas = \App\SAFEDistortionUserData::find($id)->deltadeltas;
					// $audiofeaturedata = \App\SAFEDistortionUserData::find($id)->audiofeaturedata;
					foreach (\App\SAFEDistortionUserData::all() as $obj) {
						$temp = [
							'ID' => $obj->ID,
							'userdata' => $obj,
							// "deltas" => [
							// 	"processed" => $deltas->filter(function($item){
							// 	    return $item->isProcessed();
							// 	})->values()->values(),
							// 	"unprocessed" => $deltas->filter(function($item){
							// 	    return !$item->isProcessed();
							// 	})->values()->values()
							// ],
							// "deltadeltas" => $deltadeltas,
							// "audiofeaturedata" => [
							// 	"processed" => $audiofeaturedata->filter(function($item){
							// 	    return $item->isProcessed();
							// 	})->values()->values(),
							// 	"unprocessed" => $audiofeaturedata->filter(function($item){
							// 	    return !$item->isProcessed();
							// 	})->values()->values()
							// ]
						];
						array_push($result,$temp);
						unset($temp);
					}
					break;
				case "SAFEEqualiser":
					//$deltas = \App\SAFEEqualiserUserData::find($id)->deltas;
					//$deltadeltas = \App\SAFEEqualiserUserData::find($id)->deltadeltas;
					// $audiofeaturedata = \App\SAFEEqualiserUserData::find($id)->audiofeaturedata;
					foreach (\App\SAFEEqualiserUserData::all() as $obj) {
						$temp = [
							'ID' => $obj->ID,
							'userdata' => $obj,
							// "deltas" => [
							// 	"processed" => $deltas->filter(function($item){
							// 	    return $item->isProcessed();
							// 	})->values()->values(),
							// 	"unprocessed" => $deltas->filter(function($item){
							// 	    return !$item->isProcessed();
							// 	})->values()->values()
							// ],
							// "deltadeltas" => $deltadeltas,
							// "audiofeaturedata" => [
							// 	"processed" => $audiofeaturedata->filter(function($item){
							// 	    return $item->isProcessed();
							// 	})->values()->values(),
							// 	"unprocessed" => $audiofeaturedata->filter(function($item){
							// 	    return !$item->isProcessed();
							// 	})->values()->values()
							// ]
						];
						array_push($result,$temp);
						unset($temp);
					}
					break;
				case "SAFEReverb":
					// $deltas = \App\SAFEReverbUserData::find($id)->deltas;
					// $deltadeltas = \App\SAFEReverbUserData::find($id)->deltadeltas;
					// $audiofeaturedata = \App\SAFEReverbUserData::find($id)->audiofeaturedata;
					foreach (\App\SAFEReverbUserData::all() as $obj) {
						$temp = [
							'ID' => $obj->ID,
							'userdata' => $obj,
							// "deltas" => [
							// 	"processed" => $deltas->filter(function($item){
							// 	    return $item->isProcessed();
							// 	})->values()->values(),
							// 	"unprocessed" => $deltas->filter(function($item){
							// 	    return !$item->isProcessed();
							// 	})->values()->values()
							// ],
							// "deltadeltas" => $deltadeltas,
							// "audiofeaturedata" => [
							// 	"processed" => $audiofeaturedata->filter(function($item){
							// 	    return $item->isProcessed();
							// 	})->values()->values(),
							// 	"unprocessed" => $audiofeaturedata->filter(function($item){
							// 	    return !$item->isProcessed();
							// 	})->values()->values()
							// ]
						];
						array_push($result,$temp);
						unset($temp);
					}
					break;
			}
		}else{
			$terms = json_decode($request->input('terms'));
		}
		if($request->input('sneakpeak', null)){
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
		}else{
			if($terms != "all"){
				foreach ($terms as $term) {
					switch ($plugin) {
						case "SAFECompressor":
							foreach (\App\SAFECompressorUserData::where('Descriptors','LIKE',trim($term))->get() as $termobj) {
								array_push($ids,$termobj->ID);
							}
							unset($termobj);
							break;
						case "SAFEDistortion":
							foreach (\App\SAFEDistortionUserData::where('Descriptors','LIKE',trim($term))->get() as $termobj) {
								array_push($ids,$termobj->ID);
							}
							unset($termobj);
							break;
						case "SAFEEqualiser":
							foreach (\App\SAFEEqualiserUserData::where('Descriptors','LIKE',trim($term))->get() as $termobj) {
								array_push($ids,$termobj->ID);
							}
							unset($termobj);
							break;
						case "SAFEReverb":
							foreach (\App\SAFEReverbUserData::where('Descriptors','LIKE',trim($term))->get() as $termobj) {
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
							// $deltas = \App\SAFECompressorUserData::find($id)->deltas;
							// $deltadeltas = \App\SAFECompressorUserData::find($id)->deltadeltas;
							// $audiofeaturedata = \App\SAFECompressorUserData::find($id)->audiofeaturedata;
							$userdata = \App\SAFECompressorUserData::find($id);
							break;
						case "SAFEDistortion":
							// $deltas = \App\SAFEDistortionUserData::find($id)->deltas;
							// $deltadeltas = \App\SAFEDistortionUserData::find($id)->deltadeltas;
							// $audiofeaturedata = \App\SAFEDistortionUserData::find($id)->audiofeaturedata;
							$userdata = \App\SAFEDistortionUserData::find($id);
							break;
						case "SAFEEqualiser":
							//$deltas = \App\SAFEEqualiserUserData::find($id)->deltas;
							//$deltadeltas = \App\SAFEEqualiserUserData::find($id)->deltadeltas;
							// $audiofeaturedata = \App\SAFEEqualiserUserData::find($id)->audiofeaturedata;
							$userdata = \App\SAFEEqualiserUserData::find($id);
							break;
						case "SAFEReverb":
							// $deltas = \App\SAFEReverbUserData::find($id)->deltas;
							// $deltadeltas = \App\SAFEReverbUserData::find($id)->deltadeltas;
							// $audiofeaturedata = \App\SAFEReverbUserData::find($id)->audiofeaturedata;
							$userdata = \App\SAFEReverbUserData::find($id);
							break;
					}
					$temp = [
						'ID' => $id,
						'userdata' => $userdata,
						// "deltas" => [
						// 	"processed" => $deltas->filter(function($item){
						// 	    return $item->isProcessed();
						// 	})->values()->values(),
						// 	"unprocessed" => $deltas->filter(function($item){
						// 	    return !$item->isProcessed();
						// 	})->values()->values()
						// ],
						// "deltadeltas" => $deltadeltas,
						// "audiofeaturedata" => [
						// 	"processed" => $audiofeaturedata->filter(function($item){
						// 	    return $item->isProcessed();
						// 	})->values()->values(),
						// 	"unprocessed" => $audiofeaturedata->filter(function($item){
						// 	    return !$item->isProcessed();
						// 	})->values()->values()
						// ]
					];
					array_push($result,$temp);
					unset($temp);
					unset($deltas);
					unset($deltadeltas);
					unset($audiofeaturedata);
					unset($userdata);
				}
				unset($ids);
			}
		}
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
	
	/**
	 * 
	 * termList lists all the terms available on the plugin requested in a JSON format
	 * This is ussually used to feed autocomplete inputs 
	 * 
	 * GET
	 * $plugin string
	 * 
	 */
	public function termList($plugin){
		ini_set('memory_limit','-1');
		header('Access-Control-Allow-Origin: *');
	    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
	    header('Access-Control-Allow-Credentials: true');
		switch ($plugin) {
			case "SAFECompressor":
				$terms = \App\SAFECompressorUserData::select('Descriptors')->groupBy('Descriptors')->get()->lists('Descriptors')->toArray();
				break;
			case "SAFEDistortion":
				$terms = \App\SAFEDistortionUserData::select('Descriptors')->groupBy('Descriptors')->get()->lists('Descriptors')->toArray();
				break;
			case "SAFEEqualiser":
				$terms = \App\SAFEEqualiserUserData::select('Descriptors')->groupBy('Descriptors')->get()->lists('Descriptors')->toArray();
				break;
			case "SAFEReverb":
				$terms = \App\SAFEReverbUserData::select('Descriptors')->groupBy('Descriptors')->get()->lists('Descriptors')->toArray();
				break;
		}
		return response(json_encode($terms),'200')->header('Content-Type', 'application/json');
	}
	/**
	 * 
	 * getDatafromID retrieves all the information for a specific term ID 
	 * You can get the IDs on /v1/{plugin}/{format}
	 * 
	 * GET
	 * $plugin string
	 * $datatype string [userdata,deltas,deltadeltas,audiofeaturedata,all]
	 * 
	 */
	public function getDatafromID($plugin,$datatype,$id,$format){
		header('Access-Control-Allow-Origin: *');
	    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
	    header('Access-Control-Allow-Credentials: true');
	    switch ($plugin) {
			case "SAFECompressor":
				switch ($datatype) {
					case 'userdata':
						$requested_data = \App\SAFECompressorUserData::find($id);
						break;
					case 'deltas':
						$requested_data =[
							"processed" => \App\SAFECompressorUserData::find($id)->deltas->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFECompressorUserData::find($id)->deltas->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'deltadeltas':
						$requested_data =[
							"processed" => \App\SAFECompressorUserData::find($id)->deltadeltas->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFECompressorUserData::find($id)->deltadeltas->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'audiofeaturedata':
						$requested_data =[
							"processed" => \App\SAFECompressorUserData::find($id)->audiofeaturedata->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFECompressorUserData::find($id)->audiofeaturedata->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'all':
						$requested_term = \App\SAFECompressorUserData::find($id);
						$requested_data = [
							'userdata' => \App\SAFECompressorUserData::find($id),
							"deltas" => [
								"processed" => $requested_term->deltas->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->deltas->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							],
							"deltadeltas" => [
								"processed" => $requested_term->deltadeltas->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->deltadeltas->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							],
							"audiofeaturedata" => [
								"processed" => $requested_term->audiofeaturedata->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->audiofeaturedata->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							]
						];
						break;
				}
				break;
			case "SAFEDistortion":
				switch ($datatype) {
					case 'userdata':
						$requested_data = \App\SAFEDistortionUserData::find($id);
						break;
					case 'deltas':
						$requested_data =[
							"processed" => \App\SAFEDistortionUserData::find($id)->deltas->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEDistortionUserData::find($id)->deltas->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'deltadeltas':
						$requested_data =[
							"processed" => \App\SAFEDistortionUserData::find($id)->deltadeltas->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEDistortionUserData::find($id)->deltadeltas->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'audiofeaturedata':
						$requested_data =[
							"processed" => \App\SAFEDistortionUserData::find($id)->audiofeaturedata->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEDistortionUserData::find($id)->audiofeaturedata->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'all':
						$requested_term = \App\SAFEDistortionUserData::find($id);
						$requested_data = [
							'userdata' => \App\SAFEDistortionUserData::find($id),
							"deltas" => [
								"processed" => $requested_term->deltas->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->deltas->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							],
							"deltadeltas" => [
								"processed" => $requested_term->deltadeltas->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->deltadeltas->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							],
							"audiofeaturedata" => [
								"processed" => $requested_term->audiofeaturedata->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->audiofeaturedata->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							]
						];
						break;
				}
				break;
			case "SAFEEqualiser":
				switch ($datatype) {
					case 'userdata':
						$requested_data = \App\SAFEEqualiserUserData::find($id);
						break;
					case 'deltas':
						$requested_data =[
							"processed" => \App\SAFEEqualiserUserData::find($id)->deltas->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEEqualiserUserData::find($id)->deltas->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'deltadeltas':
						$requested_data =[
							"processed" => \App\SAFEEqualiserUserData::find($id)->deltadeltas->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEEqualiserUserData::find($id)->deltadeltas->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'audiofeaturedata':
						$requested_data =[
							"processed" => \App\SAFEEqualiserUserData::find($id)->audiofeaturedata->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEEqualiserUserData::find($id)->audiofeaturedata->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'all':
						$requested_term = \App\SAFEEqualiserUserData::find($id);
						$requested_data = [
							'userdata' => \App\SAFEEqualiserUserData::find($id),
							"deltas" => [
								"processed" => $requested_term->deltas->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->deltas->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							],
							"deltadeltas" => [
								"processed" => $requested_term->deltadeltas->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->deltadeltas->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							],
							"audiofeaturedata" => [
								"processed" => $requested_term->audiofeaturedata->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->audiofeaturedata->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							]
						];
						break;
				}
				break;
			case "SAFEReverb":
				switch ($datatype) {
					case 'userdata':
						$requested_data = \App\SAFEReverbUserData::find($id);
						break;
					case 'deltas':
						$requested_data =[
							"processed" => \App\SAFEReverbUserData::find($id)->deltas->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEReverbUserData::find($id)->deltas->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'deltadeltas':
						$requested_data =[
							"processed" => \App\SAFEReverbUserData::find($id)->deltadeltas->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEReverbUserData::find($id)->deltadeltas->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'audiofeaturedata':
						$requested_data =[
							"processed" => \App\SAFEReverbUserData::find($id)->audiofeaturedata->filter(function($item){
							    return $item->isProcessed();
							})->values()->values(),
							"unprocessed" => \App\SAFEReverbUserData::find($id)->audiofeaturedata->filter(function($item){
							    return !$item->isProcessed();
							})->values()->values()
						];
						break;
					case 'all':
						$requested_term = \App\SAFEReverbUserData::find($id);
						$requested_data = [
							'userdata' => \App\SAFEReverbUserData::find($id),
							"deltas" => [
								"processed" => $requested_term->deltas->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->deltas->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							],
							"deltadeltas" => [
								"processed" => $requested_term->deltadeltas->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->deltadeltas->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							],
							"audiofeaturedata" => [
								"processed" => $requested_term->audiofeaturedata->filter(function($item){
								    return $item->isProcessed();
								})->values()->values(),
								"unprocessed" => $requested_term->audiofeaturedata->filter(function($item){
								    return !$item->isProcessed();
								})->values()->values()
							]
						];
						break;
				}
				break;
		}
		switch ($format) {
			case 'json':
				return response(json_encode($requested_data),'200')->header('Content-Type', 'application/json');
				break;
			case 'xml':
				$formatter = Formatter::make(json_encode($requested_data), Formatter::JSON);
				return response($formatter->toXml(),'200')->header('Content-Type', 'text/xml');
				break;
			case 'csv':
				$formatter = Formatter::make($requested_data, Formatter::ARR);
				return response($formatter->toCsv(),'200');
				break;
		}
	}
}
