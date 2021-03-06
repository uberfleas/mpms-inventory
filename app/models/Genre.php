<?php

class Genre extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'name' 				=> 'required|unique:genres',
		'description'		=> 'required'
	);

	//---Inverse Relationship Definitions

	//defines relationship to artobjs table
	public function artobj()
	{
		return $this->belongsToMany('Artobj','artobj_genre','genre_id','artobj_id');
	}

	//---Relationship Definitions
}
