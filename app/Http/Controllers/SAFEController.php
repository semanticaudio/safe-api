<?php

namespace App\Http\Controllers;


use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class SAFEController extends BaseController
{
	public function index(){
		$testing = \App\SAFEEqualiserUserData::take(30)->get();

		return response()->json($testing);
	}
}
