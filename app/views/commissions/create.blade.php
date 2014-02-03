@extends('layouts.default')
@section('content')

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<div class="col-sm-8">

<h1>Create a New Commission</h1>

{{ Form::open(array('route' => 'commissions.store')) }}
	<ul class="list-unstyled">
		<li class="form-group">
			<a class="btn btn-small btn-info popup" id="AddButton" href="/customers/create">Add Customer</a>
			<br />
			{{ Form::label('customer_id', 'Select a Customer:') }}
			{{ FormHelper::getDDBoxByArray(Customer::all(),array('fname','lname'),'customer_id') }}
		</li>
		<li class="form-group">
			{{ Form::label('start_date', 'Start Date in the form of MM-DD-YYYY:') }}
			{{ Form::text('start_date', Input::old('start_date'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('est_end_date', 'Estimated Completion date in the form of MM-DD-YYYY:') }}
			{{ Form::text('est_end_date', Input::old('est_end_date'), array('class' => 'form-control')) }}
		</li>

		<li class="form-group">
			{{ Form::label('estimate', 'Estimated Price:') }}
			{{ Form::text('estimate', Input::old('estimate'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::label('sale_status', 'Sales Permission Given?:') }}
			{{ Form::select('sale_status', array('1' => 'Undecided', '2' => 'Sales Permission Given', '3' => 'No Sales Permission'), '1') }}
		</li>

		<li class="form-group">
			{{ Form::label('notes', 'Notes:') }}
			{{ Form::textarea('notes', Input::old('notes'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
			{{ Form::label('sources', 'Source Materials Provided:') }}
			{{ Form::text('sources', Input::old('sources'), array('class' => 'form-control' )) }}
		</li>

		<li class="form-group">
		<a class="btn btn-small btn-info popup" id="AddButton" target="_blank" href="/shows/create">Add Show</a>
			<br />
			{{ Form::label('show_id', 'Select a Show (Optional):') }}
			{{ FormHelper::getDDBoxByArray(Show::all(),array('name','state'),'show_id') }}
		</li>

		<li class="form-group">
			{{ Form::submit('Create Commission Request', array('class' => 'btn btn-primary')) }}
		</li>
	</ul>
{{ Form::close() }}

</div><!-- .col-sm-8 -->

@stop