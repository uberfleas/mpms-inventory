@extends('layouts.default')
@section('content')

	<!-- set vars to use to easily reuse this code -->
	{{--*/ $model_name='Commission'; /*--}}
	{{--*/ $table_name='commissions'; /*--}}
	<!-- end set vars -->

	<h1>All the {{ $model_name }}s</h1>

	<a class="btn btn-small btn-success" href="{{ URL::to($table_name.'/create') }}">
	<span class="glyphicon glyphicon-plus"></span> Add {{ $model_name }}</a>
	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Customer</td>
				<td>Start Date</td>
				<td>Completion Date</td>
				<td>Estimate</td>
				<td>Notes</td>
				<td>Sources</td>
				<td>Show</td>
				<td>Sale Status</td>
				<td>Date Entered</td>
			</tr>
		</thead>
		<tbody>
		@foreach(${$table_name} as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->customer_id }}</td>
				<td>{{ $value->start_date }}</td>
				<td>{{ $value->est_end_date }}</td>
				<td>{{ $value->estimate }}</td>
				<td>{{ $value->notes }}</td>
				<td>{{ $value->sources }}</td>
				<td>{{ $value->show_id }}</td>
				<td>{{ $value->sale_status }}</td>
				<td>{{ $value->created_at }}</td>
				
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