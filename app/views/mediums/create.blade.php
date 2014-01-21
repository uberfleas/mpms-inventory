@extends('layouts.default')
@section('content')

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('route' => 'mediums.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::label('description', 'Description:') }}
			{{ Form::textarea('description') }}
		</li>

		<li>
			{{ Form::label('characteristics', 'Characteristics') }}
			{{ Form::textarea('characteristics') }}
		</li>

		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}

@stop