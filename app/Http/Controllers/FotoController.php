<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index()
    {
        $title = 'Galery Foto';
        $subtitle = 'List Foto';
        return view('foto.foto_index', compact('title', 'subtitle'));
    }

    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $users = Foto::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id', 'name', 'link', 'caption']);
        $datatables = Datatables::of($users)
        ->addColumn('action',function($head){
            return '<center><a href="foto/'.$head->id.'" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a> <a href="foto/'.$head->id.'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></center>';
        });

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Galery Foto';
        $subtitle = 'Add Foto';
        return view('foto.foto_add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'name'=>'required',
    		'link'=>'required',
    		'caption'=>'required'
         ]);
         Foto::insert([
            'name'=>$request->name,
            'link'=>$request->link,
            'caption'=>$request->caption
         ]);

    	\Session::flash('pesan','Data berhasil Ditambah');
    	return redirect('foto');
    }

    public function edit($id)
    {
        $title = 'Galery Foto';
        $subtitle = 'Edit Foto';
        $dt = Foto::where('id',$id)->first();

        return view('foto.foto_edit', compact('title', 'subtitle', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'link'=>'required',
            'caption'=>'required'
            ]);
        Foto::where('id',$id)->update([
            'name'=>$request->name,
            'link'=>$request->link,
            'caption'=>$request->caption
            ]);

        \Session::flash('pesan','Data berhasil di Update');
        return redirect('foto');
    }

    public function delete($id)
    {
        Foto::Where('id', $id)->delete();
        \Session::flash('pesan','Data berhasil di Delete');
    	return redirect('foto');
    }
}
