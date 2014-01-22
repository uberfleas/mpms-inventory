@extends('layouts.default')
@section('content')

<!-- jquery script to add another characteristic field-set on a button press -->
<script type="text/javascript">
$(document).ready(function(){
	<!-- ready vars -->
	var FieldCount=1;

	<!-- activates add logic -->
    $("#AddButton").click(function(e){
    	$( ".MediumChars-Add" ).append('<li class="form-group col-sm-4 BlueAlertBox" id="MediumCharsSection_' + FieldCount + '"><label for="mediumchars_name_' + FieldCount + '">Characteristic ' + FieldCount + ':</label><input class="form-control" name="mediumchars_name_' + FieldCount + '" type="text" id="mediumchars_name_' + FieldCount + '"><label for="mediumchars_description_' + FieldCount + '">Characteristic Description:</label><input class="form-control" name="mediumchars_description_' + FieldCount + '" type="text" id="mediumchars_description_' + FieldCount + '"><label for="mediumchars_example_' + FieldCount + '">Example of Characteristic:</label><input class="form-control" name="mediumchars_example_' + FieldCount + '" type="text" id="mediumchars_example_' + FieldCount + '"><br /></li>');
    		FieldCount++;
    return false;
    });
    <!-- activates remove logic -->
    $("#KillButton").click(function(e){
    	FieldCount --;
    	$("#MediumCharsSection_" + FieldCount ).remove();
    	if (FieldCount < 1) {
    		FieldCount = 1;
    	}
    	return false;
    });
});

</script>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<div class="col-sm-8">

<h1>Create a New Medium</h1>

{{ Form::open(array('route' => 'mediums.store')) }}
	<ul class="list-unstyled">
		<li class="form-group">
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('description', 'Description:') }}
			{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
		</li>

		<li>
			<a class="btn btn-small btn-info" id="AddButton" href="#anchor">Add Characteristic</a>
			<a class="btn btn-small btn-warning" id="KillButton" href="">Remove Characteristic</a>
		</li>
		<br />
		<div class="MediumChars-Add row">
		<li class='form-group col-sm-4 BlueAlertBox'>
			{{ Form::label('mediumchars_name_0', 'Characteristic:') }}
			{{ Form::text('mediumchars_name_0', Input::old('mediumchars_name_0'), array('class' => 'form-control')) }}

			{{ Form::label('mediumchars_description_0', 'Characteristic Description:') }}
			{{ Form::text('mediumchars_description_0', Input::old('mediumchars_description_0'), array('class' => 'form-control')) }}

			{{ Form::label('mediumchars_example_0', 'Example of Characteristic:') }}
			{{ Form::text('mediumchars_example_0', Input::old('mediumchars_example_0'), array('class' => 'form-control')) }}
			<br />
		</li>
		<a name="anchor"></a>
		</div>

		<li class="form-group">
			{{ Form::submit('Create Medium', array('class' => 'btn btn-primary')) }}
		</li>
	</ul>
{{ Form::close() }}

@stop