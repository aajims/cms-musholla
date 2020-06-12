<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index(){
        $title = 'Data Keuangan';
        $subtitle = 'List Keuangan';
        $keuangan = Keuangan::all();
        return view('keuangan.keuangan_index', compact('title', 'subtitle', 'keuangan'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $users = Keuangan::select([
            // DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id_trans', 'tanggal', 'uraian', 'pemasukan', 'pengeluaran', 'seksi', 'keterangan']);
        $datatables = Datatables::of($users)
        ->addColumn('action',function($head){
            return '<center><a href="keuangan/'.$head->id_trans.'" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a> <a href="keuangan/'.$head->id_trans.'" class="btn btn-hapus btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a></center>';
        });

        return $datatables->make(true);
    }


    public function add()
    {
        $title = 'Data Keuangan';
        $subtitle = 'Add Keuangan';
        return view('keuangan.keuangan_add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'tanggal'=>'required',
    		'uraian'=>'required',
    		'seksi'=>'required',
    		'keterangan'=>'required',
         ]);
        Keuangan::insert([
            'tanggal'=>$request->tanggal,
            'uraian'=>$request->uraian,
            'pemasukan'=>(int)$request->pemasukan,
            'pengeluaran'=>(int)$request->pengeluaran,
            'seksi'=>$request->seksi,
            'keterangan'=>$request->keterangan,
        ]);
    	return redirect('keuangan')->with('success','Transaksi Created Successfully.');
    }

    public function edit($id)
     {
        $title = 'Data Keuangan';
        $subtitle = 'Edit Keuangan';
        $dt = Keuangan::where('id_trans',$id)->first();

        return view('keuangan.keuangan_edit', compact('title', 'subtitle', 'dt'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
    		'tanggal'=>'required',
    		'uraian'=>'required',
    		'seksi'=>'required',
    		'keterangan'=>'required',
         ]);
        Keuangan::where('id_trans',$id)->update([
            'tanggal'=>$request->tanggal,
            'uraian'=>$request->uraian,
            'pemasukan'=>(int)$request->pemasukan,
            'pengeluaran'=>(int)$request->pengeluaran,
            'seksi'=>$request->seksi,
            'keterangan'=>$request->keterangan,
        ]);
    	return redirect('keuangan')->with('update','Transaksi Updated Successfully.');
    }

    public function delete($id)
    {
        Keuangan::Where('id_trans', $id)->delete();
        \Session::flash('pesan','Data berhasil di Delete');
    	return redirect('keuangan');
    }
}
