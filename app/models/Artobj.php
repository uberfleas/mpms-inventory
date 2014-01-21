<?php
	
	class Artobj extends Eloquent
	{

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
			return $this->belongsToMany('Genre','genres_artobjs','genre_id','artobj_id');
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

	}
	
?>