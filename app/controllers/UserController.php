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

	public function find($id)
	{
		return User::find($id);
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

	public function questions($id)
	{
		return User::find($id)->questions();
	}

	public function allquestions($id)
	{
		$user = User::find($id);
		$questions = $user->allquestions();
		$sumarries = array();
		foreach ($questions as $question) 
		{
			$qs = new QuestionSummary;
			$qid = $question->id;

			// question
			$qs->id = $question->id;
			$qs->type = $question->type;
			$qs->question = $question->question;
			$qs->answer = $question->answer;
			$qs->points = $question->points;
			$qs->choices = $question->choices->toArray();
			$qs->longitude = $question->longitude;
			$qs->latitude = $question->latitude;
			// answered
			
			$answer = Answer::whereRaw('question_id = ? and user_id = ?', array( $question->id, $id ) )->first();
			if( sizeof( $answer ) >= 1 )
			{
				$qs->correct = $answer->correct;
				$qs->last_answer = $answer->updated_at;
				$qs->answered = true;
			}
			else
			{
				$qs->answered = false;
			}
			$summaries[] = $qs->toArray();
		}
		return Response::json($summaries);
	}

	public function answered($id)
	{
		return User::find($id)->answered();
	}

	public function answers($id)
	{
		return User::find($id)->answers();
	}

	public function answer($user_id, $question_id)
	{
		$user = User::find($user_id);
		$question = Question::find($question_id);
		$token = Input::get('token');
		if ($user->token == $token)
		{
			$answer = Input::get('answer');
			$a = new Answer;
			$a->question()->associate($question);
        	$a->user()->associate($user);
        	$a->correct = ( $answer == $question->answer ) ? true : false;
        	$a->save();

        	if($a->correct)
        	{
        		$user->score += $question->points;
        	}
		    return Response::json(array('OK'), 200);
		} 
		else
		{
			return Response::json(
				array('error' => true, 'message' => 'Unauthorized Request: Could not verify token'),
            	401);
		}
	}


}
