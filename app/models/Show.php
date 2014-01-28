<?php

class Show extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'name' 			=> 'required',
		'city' 			=> 'required',
		'state'			=> 'required|alpha',
		'start_date'	=> 'required|date_format:m-d-Y'
	);

	//--- Inverse Database Relationships



	//--- Database Relationships

	//describes relationship with customers table
	public function customer() {
		return $this->hasMany('Customer');
	}

	//describes relationships with commissions table
	public function commission() {
		return $this->hasMany('Commission');
	}

	//describes relationships with orders table
	public function order() {
		return $this->hasMany('Order');
	}
}
