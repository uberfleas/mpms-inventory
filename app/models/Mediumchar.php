<?php

class Mediumchar extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' 				=> 'required',
		'description'		=> 'required'
	);

	//--- Inverse Relationship Definitions

	//defines relationships to mediums table
	public function medium()
	{
		return $this->belongsTo('Medium');
	}

	//--- Relationship Definitions

	//defines relationship to artobjchars table
	public function artobjchar()
	{
		return $this->hasMany('Artobjchar');
	}
}
