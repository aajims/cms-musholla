@extends('layouts.master')

@section('content')
	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('keuangan/'.$dt->id_trans) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label>Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							  </span>
							</div>
						<input type="text" name="tanggal" class="form-control" value="{{ $dt->tanggal }}" id="tanggal">
						</div>
					</div>
					<div class="form-group">
						<label>Uraian</label>
						<textarea class="form-control" cols="50" name="uraian" placeholder="Input text Max 200 Character"
							rows="3" 
							>{{ $dt->uraian }}</textarea>
					</div>
					<div class="form-group">
						<label>Pemasukan</label>
						<input type="text"  name="pemasukan" class="form-control" value="{{ $dt->pemasukan }}" required placeholder="Input Pemasukan">  
					</div>
					<div class="form-group">
						<label>Pengeluaran</label>
						<input type="text"  name="pengeluaran" class="form-control" value="{{ $dt->pengeluaran }}" required placeholder="Input Pengeluaran">  
					</div>
					<div class="form-group">
						<label>Seksi</label>
						<select class="form-control" name="seksi" id="seksi" data-validation="required">
							<option value="{{ $dt->seksi }}"> {{ $dt->seksi }}</option>
							<option value=""> -- Pilih Seksi --</option>
							<option value="Bendahara"> Bendahara</option>
							<option value="Sekertaris"> Sekertaris</option>
							<option value="Konsumsi"> Konsumsi</option>
							<option value="Peralatan"> Peralatan</option>
							<option value="Kebersihan"> Kebersihan</option>
							<option value="Marbot"> Marbot</option>
							<option value="Pend & Dakwah"> Pend & Dakwah</option>
						</select>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" cols="50" name="keterangan" placeholder="Input Text Max 150 Character"
						rows="3" data-validation="required"
						>{{ $dt->keterangan }}</textarea>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
		</div>
	</div>
	@endsection

@section('scripts')
<script type="text/javascript">
	function pilihTransaksi() {
		var trans = document.getElementById("transaksi").value
		if (trans === "pengeluaran"){
			document.getElementById("pengeluaran").style.display="block";
			document.getElementById("pemasukan").style.display="none";
		} else if(trans === "pemasukan") {
			document.getElementById("pengeluaran").style.display="none";
			document.getElementById("pemasukan").style.display="block";
		} else {
			document.getElementById("pengeluaran").style.display="none";
			document.getElementById("pemasukan").style.display="none";
		}
	}
	$(function () {
		//Date picker
		$('#tanggal').datepicker({
			format: 'yyyy-mm-dd'
		});
		$( "#myform" ).validate({
		rules: {
			tanggal: { required: true },
			uraian: { required: true, minlength: 4},
			seksi: { required: true },
			keterangan: { required: true, minlength: 4 }
			},
			messages: {
			tanggal: {
				required: "Tanggal mohon di isi dahulu"
			},
			uraian: {
				required: "Uraian mohon di isi dahulu",
				minlength: "Uraian Min 4 Character"
			},
			seksi: {
				required: "Seksi mohon di Pilih dahulu"
			},
			keterangan: {
				required: "Keterangan mohon di isi dahulu",
				minlength: "Uraian Min 4 Character"
			},
		}
		});
	})
</script>
@endsection