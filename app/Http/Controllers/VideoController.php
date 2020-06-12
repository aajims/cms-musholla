<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $title = 'Galery Video';
        $subtitle = 'List Video';
        return view('video.video_index', compact('title', 'subtitle'));
    }

    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $video = Video::select([
            // DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id', 'name', 'link', 'caption']);
        $datatables = Datatables::of($video)
        ->addColumn('action',function($head){
            return '<center><a href="video/'.$head->id.'" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a> <a href="video/'.$head->id.'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></center>';
        });

        // if ($keyword = $request->get('search')['value']) {
        //     $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        // }
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Galery Video';
        $subtitle = 'Add Video';
        return view('video.video_add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'name'=>'required',
    		'link'=>'required',
    		'caption'=>'required'
         ]);
         Video::insert([
            'name'=>$request->name,
            'link'=>$request->link,
            'caption'=>$request->caption
         ]);

    	\Session::flash('pesan','Data berhasil Ditambah');
    	return redirect('video');
    }

    public function edit($id)
    {
        $title = 'Galery Video';
        $subtitle = 'Edit Video';
        $dt = Video::where('id',$id)->first();

        return view('video.video_edit', compact('title', 'subtitle', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'link'=>'required',
            'caption'=>'required'
            ]);
        Video::where('id',$id)->update([
            'name'=>$request->name,
            'link'=>$request->link,
            'caption'=>$request->caption
            ]);

        \Session::flash('pesan','Data berhasil di Update');
        return redirect('video');
    }

    public function delete($id)
    {
        Video::Where('id', $id)->delete();
        \Session::flash('pesan','Data berhasil di Delete');
    	return redirect('video');
    }
}
