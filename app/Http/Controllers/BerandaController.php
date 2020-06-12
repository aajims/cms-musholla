<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BerandaController extends Controller
{
    public function index(){
    	$title = 'Beranda';
        $subtitle = 'Home';
        $total_user = DB::table('users')->count();
        $totaluang = DB::table('transaksi')->count();
        $totalfoto = DB::table('foto')->count();
        $totalvideo = DB::table('video')->count();
        return view('beranda.index',compact('title', 'subtitle'))
        ->with(['totaluser'=>$total_user])
        ->with(['tfoto'=>$totalfoto])
        ->with(['tvideo'=>$totalvideo])
        ->with(['totalmoney'=>$totaluang]);
    }
}
