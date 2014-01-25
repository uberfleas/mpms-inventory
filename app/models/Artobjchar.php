<?php

class Artobjchar extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'value' => 'required',
		'mediumchar_id' => 'required'
	);
}
