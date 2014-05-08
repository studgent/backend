<?php

class Choice extends Eloquent {
    protected $table = 'choices';
    protected $fillable = array('choice');

    public function answer()
    {
        return $this->belongsTo('Question');
    }

}
