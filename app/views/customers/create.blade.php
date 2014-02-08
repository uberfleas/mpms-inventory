@extends('layouts.default')
@section('content')

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<div class="col-sm-8">

<h1>Add a New Customer</h1>

{{ Form::open(array('route' => 'customers.store')) }}
	<ul class="list-unstyled">
		<li class="form-group">
			{{ Form::label('fname', 'First Name:') }}
			{{ Form::text('fname', Input::old('fname'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('lname', 'Last Name:') }}
			{{ Form::text('lname', Input::old('lname'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group"><div class="col-sm-4">
			<a class="btn btn-small btn-info popup" id="AddButton" target="_blank" href="/shows/create">Add Show</a>
			<br />
			{{ Form::label('show_id', 'Select First Contact Event (Optional):') }}
			{{ FormHelper::getDDBoxByArray(Show::all(),array('name','state'),'show_id','') }}</div>
		</li>

		<div class="clearfix"></div><br />

		<li class="form-group">
			{{ Form::label('street', 'Mailing Address:') }}
			{{ Form::text('street', Input::old('street'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			<div class="col-sm-4">
			{{ Form::label('city', 'City:') }}
			{{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}</div>

			<div class="col-sm-2">
			{{ Form::label('state', 'State:') }}
			{{ Form::text('state', Input::old('state'), array('class' => 'form-control')) }}</div>

			<div class="col-sm-2">
			{{ Form::label('zip', 'Zip:') }}
			{{ Form::text('zip', Input::old('zip'), array('class' => 'form-control' ))}}</div>

			<div class="clearfix"></div>
		</li>

		<li class="form-group">
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::label('phone', 'Phone:') }}
			{{ Form::text('phone', Input::old('phone'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::submit('Add Customer', array('class' => 'btn btn-primary')) }}
		</li>
	</ul>
{{ Form::close() }}

</div><!-- .col-sm-8 -->

@stop