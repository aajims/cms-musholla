@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-10">
		<h3>{{ $subtitle }}</h3>
		<div class="box">
			<div class="box-body">
				<form role="form" method="post" action="{{ url('video/'.$dt->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" value="{{ $dt->name }}" placeholder="Input Name">
						</div>
						<div class="form-group">
							<label for="name">Link</label>
							<input type="text" name="link" class="form-control" value="{{ $dt->link }}" placeholder="Input Link Instagram">
						</div>
                        <div class="form-group">
							<label for="name">Caption</label>
							<input type="text" name="caption" class="form-control" value="{{ $dt->caption }}" placeholder="Input Caption">
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Update Data</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function () {
		$( "#myform" ).validate({
		rules: {
			name: { required: true },
			link: { required: true },
			caption: { required: true }
		}
		});
    });
</script>