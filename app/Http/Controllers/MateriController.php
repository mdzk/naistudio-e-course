<?php

namespace App\Http\Controllers;

use App\BeliModel;
use App\BookmarkModel;
use App\KategoriModel;
use App\MateriModel;
use App\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    //
    public function detail(Request $request) {
        $materi = MateriModel::find($request->id);
        $materi->dilihat += 1;
        $materi->user = count(BeliModel::where('id_materi', '=', $request->id)->get());
        $materi->love = count(BookmarkModel::where('id_materi', '=', $request->id)->get());
        $materi->save();

        $data = array(
            'materi'   => $materi,
            'kategori' => KategoriModel::all(),
            'video'    => VideoModel::Where('id_materi', $request->id)->get(),
        );

        if (Auth::user()) {
            $data = array(
                'beli'     => BeliModel::where('id_user', '=', Auth::user()->id)->where('id_materi', '=', $request->id)->get(),
                'tandai'   => BookmarkModel::where('id_user', '=', Auth::user()->id)->where('id_materi', '=', $request->id)->get(),
                'materi'   => $materi,
                'kategori' => KategoriModel::all(),
                'video'    => VideoModel::Where('id_materi', $request->id)->get(),
            );
        }

        if ($request->isMethod('post'))  {
            if ($request->input('buy')) {
                $buy = new BeliModel();
                $buy->id_materi = $request->input('buy');
                $buy->id_user = Auth::user()->id;

                $buy->save();
                return redirect()->refresh();
            } elseif($request->input('remove')) {
                BookmarkModel::Where('id_materi', $request->input('remove'))
                    ->where('id_user', Auth::user()->id)
                    ->delete();
                return redirect()->refresh();
            } else {
                $tandai = new BookmarkModel();
                $tandai->id_materi = $request->input('bookmark');
                $tandai->id_user = Auth::user()->id;

                $tandai->save();
                return redirect()->refresh();
            }
        }

        return view('materi', $data);
    }
}
