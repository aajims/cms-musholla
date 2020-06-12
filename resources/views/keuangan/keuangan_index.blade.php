	@extends('layouts.master')

	@section('content')

		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<p>{{ $message }}</p>
			</>
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
		<table id="example1" class="table table-data table-striped">
			<thead>
				<tr>
					{{-- <th>#</th> --}}
					<th>Tanggal</th>
					<th>Uraian</th>
					<th>Pemasukan</th>
					<th>Pengeluaran</th>
					<th>Seksi</th>
					<th>Keterangan</th>
					<th width="90px">Action</th>
				</tr>
			</thead>
		</table>
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
				ajax: "{{ url('keuangan/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            // {data: 'id_trans', name: 'id_trans'},
	            {data: 'tanggal', name: 'tanggal'},
	            {data: 'uraian', name: 'uraian'},
	            {data: 'pemasukan', name: 'pemasukan'},
	            {data: 'pengeluaran', name: 'pengeluaran'},
	            {data: 'seksi', name: 'seksi'},
	            {data: 'keterangan', name: 'keterangan'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
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
