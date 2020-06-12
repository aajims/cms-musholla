<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Data User';
        $subtitle = 'List User';
        return view('user.user_index', compact('title', 'subtitle'));
    }

    public function yajra(Request $request){
    	DB::statement(DB::raw('set @rownum=0'));
        $users = User::select([
            DB::raw('@rownum := @rownum + 1 AS rownum'),
            'id', 'name', 'email', 'no_telp', 'level']);
        $datatables = Datatables::of($users)
        ->addColumn('action',function($rows){
            return '<center><a href="user/'.$rows->id.'" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a> <a href="user/'.$rows->id.'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></center>';
        });

        // if ($keyword = $request->get('search')['value']) {
        //     $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        // }
        return $datatables
        ->removeColumn('id')
        ->make(true);
    }

    public function add()
    {
        $title = 'Data';
        $subtitle = 'Add User';
        return view('user.user_add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'password'=>'required',
    		'nama'=>'required',
    		'no'=>'required',
    		'email'=>'required',
    		'level'=>'required',
         ]);
         User::insert([
            'password'=>Hash::make($request->password),
            'name'=>$request->nama,
            'no_telp'=>$request->no,
            'email'=>$request->email,
            'level'=>$request->level,
         ]);

    	\Session::flash('pesan','Data berhasil Ditambah');
    	return redirect('user');
    }

    public function edit($id)
     {
        $title = 'Data User';
        $subtitle = 'Edit User';
        $dt = User::where('id',$id)->first();

        return view('user.user_edit', compact('title', 'subtitle', 'dt'));
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
    		'nama'=>'required',
    		'no'=>'required',
    		'email'=>'required',
    		'level'=>'required',
         ]);
        User::where('id',$id)->update([
            'name'=>$request->nama,
            'no_telp'=>$request->no,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'level'=>$request->level,
        ]);
       
    	\Session::flash('pesan','Data berhasil di Update');
    	return redirect('user');
    }

    public function delete($id)
    {
        User::Where('id', $id)->delete();
        \Session::flash('pesan','Data berhasil di Delete');
    	return redirect('user');
    }

}
