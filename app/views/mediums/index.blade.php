@extends('layouts.default')
@section('content')

	<!-- set vars to use to easily reuse this code -->
	{{--*/ $model_name='Medium'; /*--}}
	{{--*/ $table_name='mediums'; /*--}}
	<!-- end set vars -->

	<h1>All the {{ $model_name }}s</h1>
	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Description</td>
				<td>Characteristics</td>
			</tr>
		</thead>
		<tbody>
		@foreach(${$table_name} as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->description }}</td>
				<td>{{ $value->characteristics }}</td>
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