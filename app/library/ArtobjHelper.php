<?php

class ArtobjHelper {

	static function collapseHeader($title,$target) {
		$return = '<div class="panel panel-default">
    		<div class="panel-heading">
      			<h4 class="panel-title">
        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$target.'">
          			'.$title.'
        			</a>
      			</h4>
    		</div>';

    	return $return;
	}

	static function collapseContent($content,$order) {
		$return = '<div id="collapse'.$order.'" class="panel-collapse collapse">
      			<div class="panel-body">'.
      				$content.'
        		</div>
    		</div>
  		</div>';

  		return $return;
	}

	static function putMediumList() {
		
		//get a list of all the entries 
		$mediums = Medium::all();

		$return = array();

		//make the return array
		foreach ($mediums as $key => $value) {
			$return[$value->id]['name'] = $value->name;
			$return[$value->id]['characteristics'] = $value->characteristics; 
		}

		$mediumList = $return;

		//this function will take an array containing all of the medium entries and turn them into a collapsable select form entry

		//confirm this is an array
		if (!is_array($mediumList)) {
			return 'No available Medium.';
		}

		$new_return = '';

		//take a foreach and step through the array
		foreach($mediumList as $key => $value) {
			//start radio button
			$segment = '<div class="radio"><label>'.$value['name'].'<input type="radio" name="optionsRadios" id="optionsRadios1" value='.$key.' checked>';
			//now list characteristics
			$middle = $value['characteristics'].' <br />';
			//end radio button
			$end = '</label></div>';

			$new_return = $new_return.$segment.$middle.$end;
		}

		$return = $new_return;

		return $return;
	}
	
}

?>