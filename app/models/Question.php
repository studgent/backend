<?php

class Question extends Eloquent {
    protected $table = 'questions';
    protected $fillable = array('type', 'question', 'answer', 'points', 'choices', 'longitude', 'latitude');

    public function choices()
    {
        return $this->hasMany('Choice');
    }

    public function answer()
    {
        return $this->hasMany('Answer');
    }

}
