@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('user/'.$dt->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label>Email</label>
					<input type="text" name="email" class="form-control" value="{{ $dt->email }}" id="" placeholder="Input Email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="" placeholder="Input Password">
					</div>
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" name="nama" class="form-control" value="{{ $dt->name }}" id="" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<label>No Telpon</label>
					<input type="text" name="no" class="form-control" value="{{ $dt->no_telp }}" id="" placeholder="Input No">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Level</label>
						<select class="form-control" name="level">
						<option value="{{ $dt->level }}"> {{ $dt->level }}</option>
							<option value=""> -- Pilih Level -- </option>
							<option value="Admin"> Admin</option>
							<option value="Staff"> Staff</option>
							<option value="Bendahara"> Bendahara</option>
						</select>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="/user" class="btn btn-danger"> Back</a>
					<button type="submit" class="btn btn-primary">Update Data </button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')