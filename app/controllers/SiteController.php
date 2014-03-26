<?php

class SiteController extends \BaseController {

	/**
	 * Display the index.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('home');
	}
	
	/**
	 * Display the api.
	 *
	 * @return Response
	 */
	public function api()
	{
		return View::make('api');
	}
	
	/**
	 * Displa legal terms.
	 *
	 * @return Response
	 */
	public function legal()
	{
		return View::make('legal');
	}


}
