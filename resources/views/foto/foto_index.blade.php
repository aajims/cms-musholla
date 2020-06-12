@extends('layouts.master')

@section('content')


		@if(Session::has('sukses'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Sukses!</h4>
			{{ Session::get('sukses') }}
		</div>
		@endif

		@if(Session::has('gagal'))
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
			{{ Session::get('gagal') }}
		</div>
		@endif
		
		<div class="card-body">
			<table class="table table-data table-stripped">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Link</th>
						<th>Caption</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	

<!-- Modal -->
<div class="modal modal-danger fade" id="modal-hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Danger Modal</h4>
				</div>
				<div class="modal-body">
					<p>Are You Sure Delete This Data??</p>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> -->
					<form method="post" action="">
						{{ csrf_field() }}
						{{ method_field('delete') }}
						<button type="submit" class="btn btn-outline">Delete</button>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	@endsection

	@section('scripts')

	<script type="text/javascript">
		$(document).ready(function(){

			var flash = "{{ Session::has('pesan') }}";
			if(flash){
				var pesan = "{{ Session::get('pesan') }}";
				alert(pesan);
			}

			$('.table-data').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				autowidth: true,
				ajax: "{{ url('foto/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'rownum', name: 'rownum'},
	            {data: 'name', name: 'Name'},
	            {data: 'link', name: 'Link'},
	            {data: 'caption', name: 'Caption'},
	            {data: 'action', name: 'action'}
	            ]
	        });

			$('body').on('click','.btn-hapus',function(e){
				e.preventDefault();
				var url = $(this).attr('href');

				$('#modal-hapus').find('form').attr('action',url);
				$('#modal-hapus').modal();
			})

		})
	</script>

	@endsection