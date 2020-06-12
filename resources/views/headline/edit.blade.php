@extends('layouts.master')

@section('content')


	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('headline/'.$dt->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Title</label>
						<input type="text" name="nama" class="form-control" value="{{ $dt->title }}" id="" placeholder="Input Title">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Content</label>
						<textarea class="form-control" name="content" rows="3">{{ $dt->content }}</textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Status</label>
						<select class="form-control" name="status">
							<option value="{{ $dt->status }}"> {{ $dt->status }}</option>
							<option value=""> -- Pilih Status -- </option>
							<option value="visible"> visible</option>
							<option value="unvisible"> unvisible</option>
						</select>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')