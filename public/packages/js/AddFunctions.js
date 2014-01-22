$(document).ready(function() {
	var MaxInputs			= 8; //max inputs allowed
	var InputsWrapper		= $("#InputsWrapper"); //Input boxes wrapper
	var AddButton			= $("#AddMoreFileBox"); //add button id

	var x = InputsWrapper.length; //initial text box count
	var FieldCount=1; //to keep track of text box added

	$(AddButton).click(function (e) //on add input button click
	{
		if(x <= MaxInputs) //max input box allowed
		{
			FieldCount++; //text box added increment
			//add input box
			$(InputsWrapper).append(
				'<div>
				 <input type="text" name="mytext[]" id="field_'+ FieldCount +'" value="Text '+ FieldCount +'"/>
				 <a href="#" class="removeclass">&times;</a>
				 </div>');
			x++; //text box increment
		}
	return false;
	});

	$("body").on("click",".removeclass", function(e) { //user click on remove text
		if ( x > 1 ) {
			$(this).parent('div').remove(); //remove text box
			x--; //decrement text box
		}
	return false;
	});
});