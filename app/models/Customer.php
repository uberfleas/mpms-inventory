<?php

class Customer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'fname'			=> 'required|alpha',
		'lname'			=> 'required|alpha',
		'event_id'		=> 'numeric'
	);

	//--- Inverse Database Relationships

	//defines the relationship to shows table
	public function show() {
		$this->belongsTo('Show');
	}

	//--- Database Relationships

	//defines the relationship to commissions table
	public function commission() {
		$this->hasMany('Commission');
	}

	//defines the relationship to orders table
	public function order() {
		$this->hasMany('Order');
	}

}
