<?php
	
	class Artobj extends Eloquent
	{
		public static $rules = array(
			'name'       	=> 'required',
			'medium_id'  	=> 'required|numeric',
			'date_completed'=> 'required|date_format:m-d-Y',
			'commission_id'	=> 'numeric'
		);

		//---Inverse Relationship Definitions

		//adds relationship to commissions
		public function commission() 
		{
			return $this->belongsTo('Commission');
		}

		//adds relationship to mediums
		public function medium() 
		{
			return $this->belongsTo('Medium');
		}

		//adds relationship to genres
		public function genre()
		{
			return $this->belongsToMany('Genre','artobj_genre','artobj_id','genre_id');
		}

		//---Relationship Definitions
		
		//adds relationship to images
		public function image()
		{
			return $this->hasMany('Image');
		}

		//adds relationship to artinvs
		public function artinv()
		{
			return $this->hasMany('Artinv');
		}

		//adds relationship to artobjchars
		public function artobjchar()
		{
			return $this->hasMany('Artobjchar');
		}

	}
	
?>