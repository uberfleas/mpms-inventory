<?php

class ArtobjHelper {
  /**
   * This function grabs an array from the mediums table and returns an array of all the characteristics associated with that medium
   * @return array
   */
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

  /**
   * This function creates a collapse based on bootstrap and jquery based on one medium $id
   * @param  string   $name_and_desc
   * @param  integer  $medium_id
   * @param  array    $collapse_content
   * @return string
   */
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
                <div class="panel-body">
                <p class="help-block"><strong>Fill in all the fields below to choose this medium.</strong>
                </p>'.$collapse_content;

    //now we finish the collapse
    $ending = '</div><!-- .panel-collapse -->
              </div><!-- .panel-body -->
              </div><!-- .panel -->';

    //we prep for return
    $return = $beginning.$middle.$ending;
    //jettison return pod
    return $return;
  }
  /**
   * This function handles each individual character for a medium collapse, spits out the whole list of em
   * @param  array $medium_char_set
   * @return string
   */
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
        $medium_id = $char->medium_id;

        //check for contents in example and add default if none
        if($example == '') {
          $example = "No example provided.";
        }

        //add entry to middle
        $middle .='<li class="form-group">
            <label for="medium_x_'.$medium_id.'_x_'.strtolower($name).'_x_'.$id.'">'.$name.':</label>
            <p class="help-block">'.$description.'('.$example.').</p>
            <input class="form-control" name="medium_x_'.$medium_id.'_x_'.strtolower($name).'_x_'.$id.'" type="text" id="'.strtolower($name).'_'.$id.'">
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
  /**
   * this shows the html for each retrieved genre
   * @param  array $genres_array
   * @return string
   */
  static function showGenreCheckbox($genres_array) {
    //this function will spit out a set of checkboxes relating to all previously entered genres
    
    //set beginning of checkbox fieldset
    $beginning = '<fieldset>
                  <p class="help-block">Check the box next to all applicable Genres.</p>';
    //initiate middle var
    $middle = '';

    //start loop for each checkbox
    foreach ($genres_array as $value) {
      //set nice names for vars
      $name = $value->name;
      $desc = $value->description;
      $id = $value->id;

      //add a checkbox to the $middle
      $middle .= '<div class="checkbox">
                  <label>
                  <input type="checkbox" value="'.$id.'" name="genres[]">
                  '.$name.'- <small>'.$desc.'</small>
                  </label>
                  </div>';
    }

    //set the end var
    $end = '</fieldset>';

    //make return var
    $return = $beginning.$middle.$end;

    //jettison pod
    return $return;
  }
  /**
   * Prepares the Input::all() array to have each set of information sent to its appropriate array and hence it's own destination table
   * @param  array $array
   * @return array
   */
  static function prepArtobjArray($array) {
    //this function takes an Input::all() array and sorts it

    //check to make sure it's a valid array
    if(!is_array($array)) {
      throw new \Exception('ArtobjHelper says: I asked for an array and I did not get one.');
    }
    //make sure that there is an entry for $array['medium_id'] in case user didn't select one to prevent errors
    if (!array_key_exists('medium_id', $array)) {
      $array['medium_id'] = '';
    }
    //make our destination arrays for sorting
    $artobj_array = array();
    $artobjchars_array = array();
    $genre_array = array();

    //if we made it this far we have a valid array, time for a loop
    foreach($array as $key => $value) {
      //first we need to check to see if the medium id was set
      if ($key == 'medium_id') {
        $artobj_array['medium_id'] = $value;
      }
      //now we check to see if it is a genre entry
      if($key == 'genres') {
        //this is a genre entry and an array
        $genre_array = $value;
      }
      //check to see what category the input belongs in using the key
      if (str_contains($key,'medium_') && $key != 'medium_id') {
        //this is a medium characteristic field and not an artobjs one
        //we explode out the medium_id from the second spot in the key name so we can make sure we don't pass anything that doesn't match
        $temp_array = explode('_x_',$key);
        $medium_id = $temp_array[1];
        $char_id = $temp_array[3];
        $name = $temp_array[2];
        //now we add it to our array if the $medium_id matches
        if ($medium_id == $array['medium_id']) {
          $artobjchars_array[$char_id] = $value; 
        }
      } else {
        //this is a artobj field
        $artobj_array[$key] = $value;
      }
    }

    //now we add both arrays to a super array
    $return_array = array(
      'artobj'        => $artobj_array,
      'artobjchars'   => $artobjchars_array,
      'genre'         => $genre_array
    );

    //return the payload
    return $return_array;
  }

}

?>