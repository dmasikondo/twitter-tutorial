<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//dd(\Auth::user()->followers()->get());
        return view('home');
    }
}
