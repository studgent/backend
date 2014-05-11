<?php

class PoI extends Eloquent {
	protected $table = 'poi';
	protected $fillable = array('type','latitude','longitude','name','details','uri','cafeplan_id','cafeplan_uri');

    
    public function checkins()
    {
        $checkins = $this->hasMany('CheckIn')->getResults();
        return $checkins;
    }
}
