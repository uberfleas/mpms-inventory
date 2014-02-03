@extends('layouts.default')
@section('content')

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('route' => 'genres.store')) }}
	<ul class="list-unstyled col-sm-4">
		<li class="form-group">
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('description', 'Description:') }}
			{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
		</li>

		<li>
			{{ Form::submit('Add Genre', array('class' => 'btn btn-primary')) }}
		</li>
	</ul>
{{ Form::close() }}

</div><!-- .col-sm-8 -->

@stop