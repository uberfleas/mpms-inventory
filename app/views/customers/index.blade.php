@extends('layouts.default')
@section('content')

	<!-- set vars to use to easily reuse this code -->
	{{--*/ $model_name='Customer'; /*--}}
	{{--*/ $table_name='customers'; /*--}}
	<!-- end set vars -->

	<h1>All the {{ $model_name }}s</h1>

	<a class="btn btn-small btn-success" href="{{ URL::to($table_name.'/create') }}">
	<span class="glyphicon glyphicon-plus"></span> Add {{ $model_name }}</a>
	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Address</td>
				<td>Phone</td>
				<td>Email</td>
				<td>First Contact</td>
			</tr>
		</thead>
		<tbody>
		@foreach(${$table_name} as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->fname }} {{ $value->lname }}</td>
				<td>{{ $value->street }}, {{ $value->city }}, {{ $value->state }}, {{ $value->zip }}</td>
				<td>{{ $value->phone }}</td>
				<td>{{ $value->email }}</td>
				<td>{{ $value->show_id }}</td>
				<!-- adding show edit and delete buttons -->
				<td>
					
					<!-- delete button -->
					
					<!-- show button -->
					<a class="btn btn-small btn-success" href="{{ URL::to($table_name.'/'.$value->id) }}">Show {{ $model_name }}</a>
					
					<!-- edit button -->
					<a class="btn btn-small btn-info" href="{{ URL::to($table_name.'/'.$value->id.'/edit') }}">Edit {{ $model_name }}</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
					
@stop