<?php

class Calendar extends Eloquent {
	protected $table = 'calendar';
	protected $fillable = array('type',
								'name',
								'details',
								'description',
								'contact',
								'street',
								'number',
								'latitude',
								'longitude',
								'phone',
								'email',
								'uri',
								'image_small',
								'image',
								'prices',
								'visitgent_id');

}