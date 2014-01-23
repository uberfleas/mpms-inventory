<?php

class Medium extends Eloquent {

	protected $table = 'mediums';

	protected $guarded = array();

	public static $rules = array(
		'name' 				=> 'required|unique:mediums',
		'description'		=> 'required'
	);

	//---Inverse Relationship Definitions

	//defines relationship to addtypes table
	public function addtype()
	{
		return $this->belongsToMany('Addtype');
	}

	//---Relationship Definitions

	//defines relationship to artobjs table
	public function artobj()
	{
		return $this->hasMany('Artobj');
	}

	//defines relationship to arttypes table
	public function arttype()
	{
		return $this->hasMany('Arttype');
	}

	//defines relationships to mediumchars table
	public function mediumchar()
	{
		return $this->hasMany('Mediumchar');
	}
}
