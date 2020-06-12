<?php

namespace App\Http\Controllers;

use DB;
use Datatables;
use App\Models\Headline;

use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    public function index()
    {
        $title = 'Data Headline';
        $subtitle = 'List Headline';
        $headline = Headline::all();
        return view('headline.index', compact('title', 'subtitle', 'headline'))
        ->with('no', (request()->input('page', 1) - 1));
    }
    public function yajra(Request $request){
    	DB::statement(DB::raw('set @rownum=0'));
        $users = Headline::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id', 'title', 'content', 'status']);
        $datatables = Datatables::of($users)
        ->addColumn('action',function($head){
            return '<center><a href="headline/'.$head->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <a href="headline/'.$head->id.'" class="btn btn-hapus btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a></center>';
        });

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }
    public function add()
    {
        $title = 'Headline';
        $subtitle = 'Add Headline';
        return view('headline.add', compact('title', 'subtitle'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
    		'nama'=>'required',
    		'content'=>'required',
    		'status'=>'required'
         ]);
         Headline::insert([
            'title'=>$request->nama,
            'content'=>$request->content,
            'status'=>$request->status,
            'id_user'=>('2')
         ]);
         return redirect('headline')
         ->with('success','Headline Created successfully');    
    }

    public function edit($id)
     {
        $title = 'Headline';
        $subtitle = 'Edit Headline';
        $dt = Headline::where('id',$id)->first();

        return view('headline.edit', compact('title', 'subtitle', 'dt'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'nama'=>'required',
            'content'=>'required',
    		'status'=>'required'
         ]);
    	Headline::where('id',$id)->update([
    		'title'=>$request->nama,
            'content'=>$request->content,
            'status'=>$request->status,
        ]);
        return redirect('headline')
                        ->with('update','Headline updated successfully');
    }

    public function delete($id)
    {
        Headline::Where('id', $id)->delete();
    	return redirect('headline') ->with('delete','Headline Delete successfully');
    }
}
