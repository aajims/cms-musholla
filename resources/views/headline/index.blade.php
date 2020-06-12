@extends('layouts.master')

@section('content')

		@if($message = Session::get('success'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<p>{{ $message }}</p>
			</div>
		@endif
		@if ($message = Session::get('update'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<p>{{ $message }}</p>
			</div>
		@endif
		@if ($message = Session::get('delete'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<p>{{ $message }}</p>
			</div>
		@endif
		<div class="card-body">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Content</th>
						<th>Status</th>
						<th width="90px">Action</th>
					</tr>
				</thead>
				@foreach ($headline as $row)
				<tbody>
					<tr>
					<td>{{ ++$no }}</td>
					<td>{{ $row->title }}</td>
					<td>{{ $row->content }}</td>
					<td>{{ $row->status }}</td>
					<td>
						<a href="{{action('HeadlineController@edit', $row['id'])}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt" title="Edit"></i> Edit</a>&nbsp;
						<form action="{{ action('HeadlineController@delete', $row->id)}}" method="post" style="display: inline-block">
							@csrf
							@method('DELETE')
							<button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure delete this data.....???')"><i class="fas fa-trash" title="Delete"></i> Delete</button>
						</form>
					</td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>

	@endsection

	@section('scripts')
	<script>
		$(function () {
		  $("#example2").DataTable({
			"responsive": true,
			"autoWidth": true,
			"searching": false
		  });
		})
	</script>
	@endsection