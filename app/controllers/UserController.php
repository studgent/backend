<?php

class UserController extends \BaseController {

	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($email)
	{
		return User::where('email', '=', $email)->get();
	}
	public function all()
	{
		return User::all();
	}

	public function login()
	{
		$email  = Input::get('email');
		$password  = Input::get('password');
		$user = User::where('email', '=', $email)->first();
		if ($user != null and Hash::check($password, $user->password))
		{
		    return Response::json(array('token' => $user->token, 'user' => $user->toArray() ), 200);
		} 
		else
		{
			return Response::json(
				array('error' => true, 'message' => 'Unauthorized Request: Could not login'),
            	401);
		}
	}


}
