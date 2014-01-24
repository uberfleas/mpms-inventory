@extends('layouts.default')
@section('content')

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<div class="col-sm-8">

{{ Form::open(array('route' => 'artobjs.store')) }}
	<ul class="list-unstyled">
		<li class="form-group">
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			
			<a class="btn btn-small btn-info" href="{{ URL::to('mediums/create') }}">Add Medium</a>
			<a class="btn btn-small btn-primary" href="{{ URL::to('mediums/edit') }}">Edit Medium</a>

		</li>

		<div class="form-group" id="accordion">

		<?php foreach (ArtobjHelper::getMediumcharArray() as $name_and_desc => $chars_array) { ?>

      		<?php $collapse_content = ArtobjHelper::makeCollapseContent($chars_array); ?>
      		{{ ArtobjHelper::mediumsCollapse($name_and_desc,$chars_array[0]['medium_id'],$collapse_content) }}
	
		<?php } ?>

		</div>

		<li class="form-group">
			{{ Form::label('date_completed', 'Date completed:') }}
			{{ Form::text('date_completed', Input::old('date_completed'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('commission_id', 'Commission id:') }}
			{{ Form::text('commission_id', Input::old('commission_id'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('tagline', 'Tagline:') }}
			{{ Form::text('tagline', Input::old('tagline'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::submit('Create Art Object', array('class' => 'btn btn-primary')) }}
		</li>
	</ul>
{{ Form::close() }}

</div>

<!-- script for collapsible elements -->
<script type="text/javascript">
$(document).ready( function(){
	$("a#medium_radio_toggle").click( function() {
		$(this).siblings("input[type=radio]").prop("checked", true);
	});
});
</script>

@stop