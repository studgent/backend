<?php

class Cafe extends Eloquent {
	protected $table = 'cafe';
	protected $fillable = array('latitude','longitude','name','details','uri','cafeplan_id','cafeplan_uri');

}