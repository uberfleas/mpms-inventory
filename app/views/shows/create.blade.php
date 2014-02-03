@extends('layouts.default')
@section('content')

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<div class="col-sm-8">

<h1>Create a New Show</h1>

{{ Form::open(array('route' => 'shows.store')) }}
	<ul class="list-unstyled">
		<li class="form-group">
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('city', 'City:') }}
			{{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('state', 'State') }}
			{{ Form::text('state', Input::old('state'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::label('start_date', 'Start Date in the form of MM-DD-YYYY:') }}
			{{ Form::text('start_date', Input::old('state'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::label('end_date', 'End date in the form of MM-DD-YYYY:') }}
			{{ Form::text('end_date', Input::old('end_date'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::submit('Create Show', array('class' => 'btn btn-primary')) }}
		</li>
	</ul>
{{ Form::close() }}

</div><!-- .col-sm-8 -->

@stop