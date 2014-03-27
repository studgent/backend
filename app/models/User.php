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
								'image');

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
}
