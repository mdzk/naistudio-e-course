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
            'notif'    => MateriModel::orderBy('id', 'desc')->take(5)->get(),
        );

        return view('kursus', $data);
    }

    public function gratis(Request $request) {
        $data = array(
            'kategori' => KategoriModel::all(),
            'materi'   => MateriModel::orderBy('id', 'desc')->where('harga', 'FREE')->get(),
            'notif'    => MateriModel::orderBy('id', 'desc')->take(5)->get(),
        );

        return view('kursus', $data);
    }

    public function berbayar(Request $request) {
        $data = array(
            'kategori' => KategoriModel::all(),
            'materi'   => MateriModel::orderBy('id', 'desc')->where('harga', 'NOT LIKE' , 'FREE')->get(),
            'notif'    => MateriModel::orderBy('id', 'desc')->take(5)->get(),
        );

        return view('kursus', $data);
    }

    public function popular(Request $request) {
        $data = array(
            'kategori' => KategoriModel::all(),
            'materi'   => MateriModel::orderBy('user', 'desc')->get(),
            'notif'    => MateriModel::orderBy('id', 'desc')->take(5)->get(),
        );

        return view('kursus', $data);
    }

    public function search(Request $request) {
        $materi = MateriModel::Where('nama_materi', 'like' , '%' . $request->q . '%')->paginate(20);

        $data = array(
            'materi' => $materi,
            'notif'    => MateriModel::orderBy('id', 'desc')->take(5)->get(),
            'kategori' => KategoriModel::all(),
        );
        return view('search', $data);
    }

    public function kontak(Request $request) {
        $data = array(
            'notif'    => MateriModel::orderBy('id', 'desc')->take(5)->get(),
        );
        return view('kontak', $data);
    }

    public function tentang(Request $request) {
        $data = array(
            'notif'    => MateriModel::orderBy('id', 'desc')->take(5)->get(),
        );
        return view('tentang', $data);
    }

}
