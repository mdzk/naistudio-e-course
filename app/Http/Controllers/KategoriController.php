<?php

namespace App\Http\Controllers;

use App\KategoriModel;
use App\MateriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function detail(Request $request) {

        $data = array(
        	'notif'   => MateriModel::orderBy('id', 'desc')->take(5)->get(),
            'materi'   => MateriModel::orderBy('id', 'desc')->where('id_kategori', $request->id)->get(),
            'kategori' => KategoriModel::all(),
            'anu'      => KategoriModel::find($request->id),
        );

        return view('kategori', $data);
    }
}
