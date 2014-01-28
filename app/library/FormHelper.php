<?php

class FormHelper {

	static function getDDBoxByArray($array,$fields,$select_name) {

		//set the beginning of the dropdown box
		$beginning = '<select name="'.$select_name.'" class="form-control">';
		//set the first part of middle
		$middle = '<option value="0">Select or Add</option>';

		//step thru array to get id and name fields
		foreach ($array as $value) {
			$id = $value->id;
			//set the name var
			$name = '';
			//now we need to get the fields that we want displayed in the dropdown box
			foreach ($fields as $subkey => $subvalue) {
				$name .= $value->{$subvalue}.' ';
			}
			//now we set up the dropdown part of the dropbox
			$middle .= '<option value="'.$id.'">'.$name.'</option>';
		}

		//set the ending of the dropdown box
		$end = '</select>';

		//set up return
		$return = $beginning.$middle.$end;

		//jettison cargo
		return $return;
	}
}