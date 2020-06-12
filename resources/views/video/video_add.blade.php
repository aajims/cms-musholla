@extends('layouts.master')

@section('content')

		<div class="col-md-10">
			<div class="card-body">
				<form role="form" id="myform" method="post" action="{{ url('video/store') }}">
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" id="" placeholder="Input Name">
						</div>
						<div class="form-group">
							<label for="name">Link</label>
							<input type="text" name="link" class="form-control" id="" placeholder="Input Embed Youtube">
						</div>
                        <div class="form-group">
							<label for="name">Caption</label>
							<input type="text" name="caption" class="form-control" id="" placeholder="Input Caption">
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Save Data</button>
					</div>
				</form>
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