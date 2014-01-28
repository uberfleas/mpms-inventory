<?php

class Commission extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'start_date'	=> 'required|date_format:m-d-Y',
		'est_end_date'  => 'required|date_format:m-d-Y',
		'estimate'		=> 'required',
		'notes'			=> 'required',
		'sale_status'	=> 'required',
		'event_id'		=> 'numeric'
	);

	//--- Inverse Database Relationships

	//defines relationship to customers table
	public function customer() {
		return $this->belongsTo('Customer');
	}

	//defines relationship to events table
	public function show() {
		return $this->belongsTo('Show');
	}

	//--- Database Relationships

	//defines relationship to artobjs table
	public function artobj() {
		return $this->hasOne('Artobj');
	}
}


