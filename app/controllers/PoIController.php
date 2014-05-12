<?php

class PoIController extends \BaseController {

	public function page($perpage, $page){
    	$results = PoI::with('checkins')->forPage($page, $perpage)->get();
		return $results->toJson();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return PoI::with('checkins')->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return PoI::with('checkins')->find($id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  String  $id
	 * @return Response
	 */
	public function name($keyword)
	{
		return PoI::where('name', 'LIKE', '%'.$keyword.'%')->with('checkins')->get();
	}

}
