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

  static function getMediumcharArray() {
    //pull mediums from Medium
    $mediums = Medium::all();
    //set an array to hold all of the characteristics
    $mediumchars = array();
    //loop through this array and get the characteristics for each medium type
    foreach($mediums as $value) {
      //use the $value->id from each medium to get the all the characteristics
      $mediumchars[$value->name.'._.'.$value->description] = Mediumchar::where('medium_id','=',$value->id)->get();
    }
    //now we can return the array that has all the important information in the following form
    /* $mediumchars['Painting-Description'][0]= array(
      'id' => '5',
      'name' => 'Paint Type',
      'description' => 'Type of paint used',
      'medium_id' => '1',
      'example' => 'Acrylic, watercolor...'
    ); */
    return $mediumchars;
  }

  static function mediumsCollapse($name_and_desc,$medium_id,$collapse_content) {
    //this function will spit out a collapse section based on medium information
    //Beginning of the html for the collapse
    $beginning = '<div class="panel panel-default panel-heading">
                  <h5 class="panel-title">
                  <label>';
    
    //break out the $name_and_desc into their component parts
    $temp_array = explode('._.',$name_and_desc);
    //set nice var names
    $name = $temp_array[0];
    $desc = $temp_array[1];

    //now we construct the actual input as a radio button
    $middle = '<input type="radio" name="medium_id" id="medium_id'.$medium_id.'" value="'.$medium_id.'">
                <a class="medium'.$medium_id.'" data-toggle="collapse" data-parent="#accordion" id="medium_radio_toggle" href="#collapse_'.$medium_id.'">
                '.$name.' - <span class="h6">'.$desc.'</span>
                </a>
                </label>
                </h5>
                <div id="collapse_'.$medium_id.'" class="panel-collapse collapse">
                <div class="panel-body">'.$collapse_content;

    //now we finish the collapse
    $ending = '</div><!-- .panel-collapse -->
              </div><!-- .panel-body -->
              </div><!-- .panel -->';

    //we prep for return
    $return = $beginning.$middle.$ending;
    //jettison return pod
    return $return;
  }

  static function makeCollapseContent($medium_char_set) {
    //this function spits out the innards of a collapse form for the artobjs
    $beginning = '<div class="form-group">
                  <ul class="list-unstyled">';
    //make a var that will hold all the generated html
    $middle = '';

    //step through the array of characteristics for one medium and list them
    foreach($medium_char_set as $char) {
        $name = $char->name;
        $description = $char->description;
        $id = $char->id;
        $example = $char->example;

        //check for contents in example and add default if none
        if($example == '') {
          $example = "No example provided.";
        }

        //add entry to middle
        $middle .='<li class="form-group"><p class="help-block">'.$description.'('.$example.').</p>
            <label for="'.strtolower($name).'_'.$id.'">'.$name.':</label>
            <input class="form-control" name="'.strtolower($name).'_'.$id.'" type="text" id="'.strtolower($name).'_'.$id.'">
            </li>';
    }

    //var for the end
    $end = '</ul>
            </div>';

    //prepare ejectable
    $return = $beginning.$middle.$end;
    //eject it into space
    return $return;
  }

}

?>