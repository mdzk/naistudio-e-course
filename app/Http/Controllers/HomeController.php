<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriModel;
use App\MateriModel;

class HomeController extends Controller
{
    //
    public function index() {
    	$data = array(
    		'kategori' => KategoriModel::all(),
    		'materi'   => MateriModel::orderBy('user', 'desc')->take(2)->get(),
    	);

    	return view('index', $data);
    }
}
