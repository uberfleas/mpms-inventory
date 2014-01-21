@extends('layouts.default')
@section('content')
	<h1>All the Art Objects</h1>
	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Medium ID</td>
				<td>Date Completed</td>
				<td>Medium List</td>
				<td>Commission ID</td>
				<td>Tagline</td>
			</tr>
		</thead>
		<tbody>
		@foreach($artobjs as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->medium_id }}</td>
				<td>{{ $value->date_completed }}</td>
				<td>{{ $value->medium_values }}</td>
				<td>{{ $value->commission_id }}</td>
				<td>{{ $value->tagline }}</td>
				
				<!-- adding show edit and delete buttons -->
				<td>
					
					<!-- delete button -->
					
					<!-- show button -->
					<a class="btn btn-small btn-success" href="{{ URL::to('artobjs/'.$value->id) }}">Show Artobj</a>
					
					<!-- edit button -->
					<a class="btn btn-small btn-info" href="{{ URL::to('artobjs/'.$value->id.'/edit') }}">Edit Artobj</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
					
@stop