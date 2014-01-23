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

}

?>