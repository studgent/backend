<?php

class CheckIn extends Eloquent {
    protected $table = 'checkins';
    protected $fillable = array('longitude', 'latitude');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function poi()
    {
        return $this->belongsTo('PoI');
    }

}
