@extends('layouts.default')
@section('content')

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('route' => 'artobjs.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::label('medium_id', 'Medium id:') }}
			{{ Form::text('medium_id') }}
		</li>

		<li>
			{{ Form::label('date_completed', 'Date completed:') }}
			{{ Form::text('date_completed') }}
		</li>

		<li>
			{{ Form::label('medium_values', 'Medium values:') }}
			{{ Form::textarea('medium_values') }}
		</li>

		<li>
			{{ Form::label('commission_id', 'Commission id:') }}
			{{ Form::text('commission_id') }}
		</li>

		<li>
			{{ Form::label('tagline', 'Tagline:') }}
			{{ Form::text('tagline') }}
		</li>

		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}

@stop