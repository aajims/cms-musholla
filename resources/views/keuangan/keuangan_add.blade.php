@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" id="myform" method="post" action="{{ url('keuangan/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label>Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							  </span>
							</div>
							<input type="text" name="tanggal" class="form-control" id="tanggal">
						</div>
					</div>
					<div class="form-group">
						<label>Uraian</label>
						<textarea class="form-control" cols="50" name="uraian" placeholder="Input text Max 200 Character"
							rows="3" 
							></textarea>
							<span class="text-danger">{{ $errors->first('uraian') }}</span>
					</div>
					<div class="form-group">
						<label>Transaksi</label>
						<select class="form-control" onchange="pilihTransaksi()" name="transaksi" id="transaksi">
							<option value=""> -- Pilih Transaksi --</option>
							<option value="pemasukan"> Pemasukan</option>
							<option value="pengeluaran"> Pengeluaran</option>
							</select>
							<span class="text-danger">{{ $errors->first('transaksi') }}</span>
					</div>
					<div class="form-group" id="pemasukan" style="display: none">
						<label>Pemasukan</label>
						<input type="text" name="pemasukan" class="form-control" placeholder="Input Pemasukan"> 
					</div>
					<div class="form-group" id="pengeluaran" style="display: none">
						<label>Pengeluaran</label>
						<input type="text" name="pengeluaran" class="form-control" placeholder="Input Pengeluaran">  
					</div>
					<div class="form-group">
						<label>Seksi</label>
						<select class="form-control" name="seksi" id="seksi" data-validation="required">
							<option value=""> -- Pilih Seksi --</option>
							<option value="Bendahara"> Bendahara</option>
							<option value="Sekertaris"> Sekertaris</option>
							<option value="Konsumsi"> Konsumsi</option>
							<option value="Peralatan"> Peralatan</option>
							<option value="Kebersihan"> Kebersihan</option>
							<option value="Marbot"> Marbot</option>
							<option value="Pend & Dakwah"> Pend & Dakwah</option>
						</select>
						<span class="text-danger">{{ $errors->first('seksi') }}</span>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" cols="50" name="keterangan" placeholder="Input Text Max 150 Character"
						rows="3" data-validation="required"
						></textarea>
						<span class="text-danger">{{ $errors->first('keterangan') }}</span>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Save </button>
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
			transaksi: { required: true },
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
			transaksi: {
				required: "Transaksi mohon di Pilih dahulu"
			},
			seksi: {
				required: "Seksi mohon di Pilih dahulu"
			},
			keterangan: {
				required: "Keterangan mohon di isi dahulu"
			},
		}
		});
	})
</script>
@endsection