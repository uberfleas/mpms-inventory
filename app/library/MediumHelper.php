<?php

class MediumHelper {

	static function prepMediumArray($array) {
		//this function takes an Input::all() array and sorts it

		//check to make sure it's a valid array
		if(!is_array($array)) {
			throw new \Exception('MediumHelper says: I asked for an array and I did not get one.');
		}

		//make our destination arrays for sorting
		$medium_array = array();
		$mediumchars_array = array();

		//if we made it this far we have a valid array, time for a loop
		foreach($array as $key => $value) {
			//check to see what category the input belongs in using the key
			if (str_contains($key,'mediumchars')) {
				//this is a characteristic field and not a medium one
				//now we have to sort it out further since there may be many seperate sets of mediumchars
				//use explode to strip out the important pieces of the $key
				$temp_array = explode('_',$key);
				//we are interested in the second two fields
				$index = $temp_array[2];
				$label = $temp_array[1];
				$mediumchars_array[$index][$label] = $value;
			} else {
				//this is a medium field
				$medium_array[$key] = $value;
			}
		}

		//now we add both arrays to a super array
		$return_array = array(
			'medium' 		=> $medium_array,
			'mediumchars' 	=> $mediumchars_array
		);

		//return the payload
		return $return_array;
	}
}

?>