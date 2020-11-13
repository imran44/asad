<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

		// $this->middleware('auth');
		// $this->middleware('checkforrole:SuperAdmin');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		//$user = User::find(\Auth::user()->id);
		return view('home', compact('user'));

	}

	// public function notification()
	// {
	//     session()->set('success','Item created successfully.');

	//     return view('home');
	// }

}
