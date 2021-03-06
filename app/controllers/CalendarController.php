<?php

class CalendarController extends \BaseController {


	public function page($perpage, $page){
    	$results = Calendar::where('date_from', '>=', date('Y-m-d'))->orderBy('date_from', 'asc')->forPage($page, $perpage)->get();
		return $results->toJson();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Calendar::where('date_from', '>=', date('Y-m-d'))->orderBy('date_from', 'asc')->get();
	}


	public function all()
	{
		return Calendar::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Calendar::find($id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  String  $id
	 * @return Response
	 */
	public function name($keyword)
	{
		return Calendar::where('date_from', '>=', date('Y-m-d'))->where('name', 'LIKE', '%'.$keyword.'%')->orderBy('date_from', 'asc')->get();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}