<?php

namespace App\Http\Controllers;

use App\BeliModel;
use App\VideoModel;
use App\MateriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    //
    public function index(Request $request) {
        $video = VideoModel::find($request->id);
        $video->dilihat += 1;
        $video->save();

        if (Auth::user()) {
            $beli = BeliModel::where('status', 2)->where('id_user', '=', Auth::user()->id)->where('id_materi', '=', $request->id_materi)->get();
            if (count($beli) == 0) {
                return redirect('kursus');
            } else {
                $data = array(
                    'notif'    => MateriModel::orderBy('id', 'desc')->take(5)->get(),
                    'video' => $video,
                    'playlist' => VideoModel::Where('id_materi', $request->id_materi)->get(),
                );
                return view('video', $data);
            }
        } else {
            return redirect('login');
        }
    }
}
