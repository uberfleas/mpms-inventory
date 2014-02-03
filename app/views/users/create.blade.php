@extends('layouts.default')
@section('content')

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<div class="col-sm-8">

<h1>Create a New User</h1>

{{ Form::open(array('route' => 'users.store')) }}
	<ul class="list-unstyled">
		<li class="form-group">
			{{ Form::label('fname', 'First Name:') }}
			{{ Form::text('fname', Input::old('fname'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('lname', 'Last Name:') }}
			{{ Form::text('lname', Input::old('lname'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password', Input::old('password'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::label('password_confirmation', 'Password Confirmation:') }}
			{{ Form::password('password_confirmation', Input::old('password_confirmation'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::submit('Create User', array('class' => 'btn btn-primary')) }}
		</li>
	</ul>
{{ Form::close() }}

</div><!-- .col-sm-8 -->

@stop