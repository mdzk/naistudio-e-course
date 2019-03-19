<?php

namespace App\Http\Controllers;

use App\KategoriModel;
use App\MateriModel;
use App\VideoModel;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    //
    public function index() {
        $data = array(
            'kategori' => KategoriModel::all(),
            'materi'   => MateriModel::orderBy('id', 'desc')->get(),
        );

        return view('kursus', $data);
    }
}
