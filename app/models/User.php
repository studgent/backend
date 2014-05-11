<?php

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'token');

	/**
	 * The attributes allowed for mass assignment
	 * @var array
	 */
	protected $fillable = array('email',
								'token',
								'password',
								'first_name',
								'last_name',
								'details',
								'phone',
								'image',
								'score');

	public function friends()
    {
    	$friends = $this->belongsToMany('User', 'user_friends', 'user_id', 'friend_id');
    	return $friends;
    }

    public function add_friend($friend_id)
	{
	    $this->friends()->attach($friend_id);   // add friend
	    $friend = User::find($friend_id);       // find your friend, and...
	    $friend->friends()->attach($this->id);  // add yourself, too
	}
	public function remove_friend($friend_id)
	{
	    $this->friends()->detach($friend_id);   // remove friend
	    $friend = User::find($friend_id);       // find your friend, and...
	    $friend->friends()->detach($this->id);  // remove yourself, too
	}

	public function answers()
	{
		$answers = $this->hasMany('Answer')->getResults();
		return $answers;
	}

	public function questions()
	{
		$answers = $this->hasMany('Answer')->getResults();
		$ids = array();
		foreach ($answers as $answer) {
			array_push($ids, $answer->question_id);
		}
		$questions = Question::whereNotIn('id', $ids)->with('choices')->get();
		return $questions;
	}

	public function answered()
	{
		$answers = $this->hasMany('Answer')->getResults();
		$ids = array();
		foreach ($answers as $answer) {
			array_push($ids, $answer->question_id);
		}
		$questions = Question::whereIn('id', $ids)->with('choices')->get();
		return $questions;
	}


	public function allquestions()
	{
		$questions = Question::with('choices')->get();
		return $questions;
	}

	public function checkins()
	{
		$checkins = $this->hasMany('CheckIn')->getResults();
		return $checkins;
	}

	public function following()
	{
		$following = $this->hasMany('Following', 'user_id')->with('User')->getResults();
		$ids = array();
		foreach ($following as $f) {
			array_push($ids, $f->following_id);
		}

		$users = sizeof($ids) > 0 ? User::whereIn('id', $ids)->get() : null;
		return $users;
	}


	public function notfollowing()
	{
		$following = $this->hasMany('Following', 'user_id')->with('User')->getResults();
		$ids = array();
		foreach ($following as $f) {
			array_push($ids, $f->following_id);
		}
		$users = sizeof($ids) > 0 ? User::whereNotIn('id', $ids)->get() : null;
		return $users;
	}

}
