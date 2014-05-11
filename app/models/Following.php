<?php

class Following extends Eloquent {
    protected $table = 'following';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function following()
    {
        return $this->belongsTo('User');
    }

}
