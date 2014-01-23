@extends('layouts.default')
@section('content')

<!-- script for collapsible elements -->
<script type="text/javascript">
$(document).ready(function(){
    $(".mytoggle").click(function(){
        $("#toggleDemo").collapse('toggle');
    });
});
</script>

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

			<div class="panel-group" id="accordion">
  				{{ ArtobjHelper::collapseHeader('Testing','One') }}
  				{{ ArtobjHelper::collapseContent('This is a test of some stuff','One') }}

  				{{ ArtobjHelper::collapseHeader('Moo!','Two') }}
  				{{ ArtobjHelper::collapseContent('This is a test of some stuff','Two') }}

  				{{ ArtobjHelper::collapseHeader('Cheese','Three') }}
  				{{ ArtobjHelper::collapseContent('This is a test of some stuff','Three') }}
  
			</div>
		</li>

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

@stop