<?php

namespace App\Http\Controllers;

use App\BeliModel;
use App\BookmarkModel;
use App\KategoriModel;
use App\MateriModel;
use App\User;
use App\VideoModel;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function index(Request $request) {
//
        $data = array(
           'user'   => User::Where('level', 'user')->orderby('id', 'desc')->take(5)->get(),
           'beli'   => BeliModel::where('status', '1')->get(),
           'materi' => MateriModel::all(),
           'video'  => VideoModel::all(),
           'saldo'  => BeliModel::where('status', 2)->get(),
        );

        if ($request->isMethod('post'))  {
            if ($request->input('done')) {
                $done         = BeliModel::Where('id', $request->input('done'))->first();
                $done->status = 2;
                $done->save();
                return redirect()->refresh();
            } else {
                BeliModel::Where('id', $request->input('cancel'))->delete();
                return redirect()->refresh();
            }
        }

        return view('admin.index', $data);
    }

    public function  notifications(Request $request) {
        $data = array(
            'notification' => BeliModel::Where('status', '1')->orderby('id', 'desc')->get(),
            'history'      => BeliModel::Where('status', '2')->orderby('id','desc')->paginate(5),
        );

        if ($request->isMethod('post'))  {
            if ($request->input('done')) {
                $done         = BeliModel::Where('id', $request->input('done'))->first();
                $done->status = 2;
                $done->save();
                return redirect()->refresh();
            } else {
                BeliModel::Where('id', $request->input('cancel'))->delete();
                return redirect()->refresh();
            }
        }
        return view('admin.transaksi', $data);
    }

    public function notificationsView(Request $request) {
        $beli = BeliModel::where('invoice', $request->invoice)->first();

        $data = array('beli' => $beli);

        if ($request->isMethod('post'))  {
            if ($request->input('done')) {
                $done         = BeliModel::Where('id', $request->input('done'))->first();
                $done->status = 2;
                $done->save();
                return redirect()->refresh();
            } else {
                BeliModel::Where('gambar', $request->input('cancel'))->delete();
                unlink('assets/img/payment/' . $request->cancel);
                return redirect('admin/transaksi');
            }
        }

        return view('admin.transaksi_view', $data);
    }

    public function  user(Request $request) {
        $data = array(
          'user' => User::Where('level', 'user')->orderBy('id', 'desc')->paginate(5),
        );

        if ($request->isMethod('post'))  {
            if ($request->input('edit')) {
                $done         = BeliModel::Where('id', $request->input('done'))->first();
                $done->status = 2;
                $done->save();
                return redirect()->refresh();
            } elseif ($request->input('remove')) {
                User::Where('id', $request->input('remove'))->delete();
                return redirect()->refresh();
            } else {

            }
        }

        return view('admin.user', $data);
    }

    public function  userView(Request $request) {
        $data = array(
            'user'   => User::find($request->id),
            'materi' => BeliModel::where('id_user', $request->id)->get(),
            'bookmark' => BookmarkModel::where('id_user', $request->id)->get(),
        );

        if ($request->isMethod('post'))  {
            if ($request->input('done')) {
                $done         = BeliModel::Where('id', $request->input('done'))->first();
                $done->status = 2;
                $done->save();
                return redirect()->refresh();
            } elseif($request->input('cancelb')) {
                BookmarkModel::Where('id', $request->input('cancelb'))->delete();
                return redirect()->refresh();
            } else {
                BeliModel::Where('id', $request->input('cancel'))->delete();
                return redirect()->refresh();
            }
        }

        return view('admin.user_view', $data);
    }

    public function  userEdit(Request $request) {
        $user = User::find($request->id);
        $data = array(
            'user'   => $user,
        );

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name'      => 'required',
                'email'     => 'required',
                'password2' => 'same:password'
            ]);

            if ($validator->fails()) {
                echo '<script>alert("Update Gagal")</script>';
            } else {

                $ex  = explode('.',$_FILES['gambar']['name']);
                if ($ex[count($ex) - 1] == "") {
                    if ($request->input('password') == "") {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');

                        $user->save();
                        return redirect('admin/user');
                    } else {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');
                        $user->password = Hash::make($request->input('password'));

                        $user->save();
                        return redirect('admin/user');
                    }

                } else {
                    if ($request->input('password') == "") {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');
                        $user->gambar   = $request->input('gambar');

                        $ex = explode('.',$_FILES['gambar']['name']);

                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $namaGambar = date('d-m-Y-H-m-s-') . str_slug($request->input('name'), '-') . '.jpg';
                            Image::make($_FILES['gambar']['tmp_name'])->fit(200, 200)->save('assets/img/user/'.$namaGambar);

                            $user->gambar = $namaGambar;
                            $user->save();
                            return redirect('admin/user');
                        }

                    } else {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');
                        $user->gambar   = $request->input('gambar');
                        $user->password = Hash::make($request->input('password'));

                        $ex  = explode('.',$_FILES['gambar']['name']);
                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $namaGambar = date('d-m-Y-H-m-s-') . str_slug($request->input('name'), '-') . '.jpg';
                            Image::make($_FILES['gambar']['tmp_name'])->fit(200, 200)->save('assets/img/user/'.$namaGambar);

                            $user->gambar = $namaGambar;
                            $user->save();
                            return redirect('admin/user');
                        }
                    }
                }
            }
        }

        return view('admin.user_edit', $data);
    }

    public function  userAdd(Request $request) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name'      => 'required',
                'email'     => 'required|unique:users',
                'password'  => 'required',
                'password2' => 'same:password',
            ]);

            if ($validator->fails()) {
                echo '<script>alert("Silahkan isi semua kolom. atau Username/Email sudah terdaftar")</script>';
            }else {
                User::create([
                    'name'     => $request->input('name'),
                    'email'    => $request->input('email'),
                    'level'    => 'user',
                    'password' => Hash::make($request->input('password')),
                ]);
                return redirect('admin/user');
            }
        }

        return view('admin.user_add');
    }

    public function materi(Request $request) {
        $data = array(
            'materi' => MateriModel::orderBy('id', 'desc')->paginate(5),
        );

        if ($request->isMethod('post'))  {
            if ($request->input('delete')) {
                $materi = MateriModel::find($request->input('delete'));
                $materi->delete();
                unlink('assets/img/materi/' . $materi->gambar);
                return redirect()->refresh();
            }
        }

        return view('admin.materi', $data);
    }

    public function materiAdd(Request $request) {

        $materi = new MateriModel();

        $data = array(
            'kategori' => KategoriModel::get(),
        );

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama_materi' => 'required',
                'id_kategori' => 'required',
                'deskripsi'   => 'required',
                'gambar'      => 'required',
            ]);

            if ($validator->fails()) {
                echo '<script>alert("Masukan data dengan benar")</script>';
            } else {

                if (empty($request->input('harga'))) {

                    $materi->nama_materi = $request->input('nama_materi');
                    $materi->id_kategori = $request->input('id_kategori');
                    $materi->deskripsi   = $request->input('deskripsi');
                    $materi->gambar      = $request->input('gambar');
                    $materi->harga       = 'FREE';
                    $materi->id_user     = Auth::user()->id;

                    $ex = explode('.',$_FILES['gambar']['name']);

                    if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                        echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                    }else {
                        $namaGambar = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_materi'), '-') . '.jpg';
                        Image::make($_FILES['gambar']['tmp_name'])->fit(530, 298)->save('assets/img/materi/'.$namaGambar);

                        $materi->gambar = $namaGambar;
                        $materi->save();
                        return redirect('admin/materi');
                    }
                } else {
                    $materi->nama_materi = $request->input('nama_materi');
                    $materi->id_kategori = $request->input('id_kategori');
                    $materi->deskripsi   = $request->input('deskripsi');
                    $materi->gambar      = $request->input('gambar');
                    $materi->harga       = $request->input('harga');
                    $materi->id_user     = Auth::user()->id;

                    $ex = explode('.',$_FILES['gambar']['name']);

                    if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                        echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                    }else {
                        $namaGambar = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_materi'), '-') . '.jpg';
                        Image::make($_FILES['gambar']['tmp_name'])->fit(530, 298)->save('assets/img/materi/'.$namaGambar);

                        $materi->gambar = $namaGambar;
                        $materi->save();
                        return redirect('admin/materi');
                    }
                }
            }
        }

        return view('admin.materi_add', $data);
    }

    public function materiEdit(Request $request) {
        $materi = MateriModel::find($request->id);

        $data = array(
          'materi'=> $materi,
          'kategori'=> KategoriModel::get(),
        );

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama_materi' => 'required',
                'id_kategori' => 'required',
                'deskripsi'   => 'required',
            ]);

            if ($validator->fails()) {
                echo '<script>alert("Masukan data dengan benar")</script>';
            } else {

                $ex  = explode('.',$_FILES['gambar']['name']);
                if ($ex[count($ex) - 1] == "") {

                    if (empty($request->input('harga'))) {
                        $materi->nama_materi = $request->input('nama_materi');
                        $materi->id_kategori = $request->input('id_kategori');
                        $materi->deskripsi   = $request->input('deskripsi');
                        $materi->harga       = 'FREE';
                        $materi->save();
                        return redirect('admin/materi');
                    }else {
                        $materi->nama_materi = $request->input('nama_materi');
                        $materi->id_kategori = $request->input('id_kategori');
                        $materi->deskripsi   = $request->input('deskripsi');
                        $materi->harga       = $request->input('harga');
                        $materi->save();
                        return redirect('admin/materi');
                    }

                } else {
                    if (empty($request->input('harga'))) {
                        $materi->nama_materi = $request->input('nama_materi');
                        $materi->id_kategori = $request->input('id_kategori');
                        $materi->deskripsi   = $request->input('deskripsi');
                        $materi->harga       = 'FREE';

                        $materi->gambar      = $request->input('gambar');
                        $ex = explode('.',$_FILES['gambar']['name']);

                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $namaGambar = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_materi'), '-') . '.jpg';
                            Image::make($_FILES['gambar']['tmp_name'])->fit(530, 298)->save('assets/img/materi/'.$namaGambar);

                            $materi->gambar = $namaGambar;
                            $materi->save();
                            return redirect('admin/materi');
                        }        
                    } else {
                        $materi->nama_materi = $request->input('nama_materi');
                        $materi->id_kategori = $request->input('id_kategori');
                        $materi->deskripsi   = $request->input('deskripsi');
                        $materi->harga       = $request->input('harga');

                        $materi->gambar      = $request->input('gambar');
                        $ex = explode('.',$_FILES['gambar']['name']);

                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $namaGambar = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_materi'), '-') . '.jpg';
                            Image::make($_FILES['gambar']['tmp_name'])->fit(530, 298)->save('assets/img/materi/'.$namaGambar);

                            $materi->gambar = $namaGambar;
                            $materi->save();
                            return redirect('admin/materi');
                        }
                    }
                }
            }
        }

        return view('admin.materi_add', $data);
    }

    public function materiDelete(Request $request) {
        MateriModel::Where('id', $request->id)->delete();
        return redirect()->back();
    }

    public function materiView(Request $request) {
        $video  = VideoModel::where('id_materi', $request->id)->get();
        $materi = MateriModel::find($request->id);
        $beli   = BeliModel::where('id_materi', $request->id)->where('status', 2)->get();

        $data = array(
          'video'  => $video,
          'materi' => $materi,
          'beli'  => $beli,
        );

        return view ('admin.materi_view', $data);
    }

    public function  kategori(Request $request) {
        $data = array(
            'kategori' => KategoriModel::all(),
        );

        if ($request->isMethod('post')) {
            if ($request->input('nama_kategori')) {
                $validator = Validator::make($request->all(), [
                    'nama_kategori' => 'required',
                ]);

                if ($validator->fails()) {
                    echo '<script>alert("Masukkan data dengan benar")</script>';
                } else {
                    $kategori = new KategoriModel();
                    $kategori->nama_kategori = $request->input('nama_kategori');

                    $kategori->save();
                    return redirect('admin/kategori');
                }
            } elseif($request->input('remove')) {
                KategoriModel::Where('id', $request->id)->delete();
                return redirect()->refresh();
            }
        }

        return view('admin.kategori', $data);
    }

    public function  kategoriDel(Request $request) {
        KategoriModel::Where('id', $request->id)->delete();
        return redirect('admin/kategori');
    }

    public function kategoriEdit(Request $request) {
        $kat = KategoriModel::find($request->id);
        $data = array(
            'kat' => $kat,
            'kategori'      => KategoriModel::all(),
        );

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama_kategori' => 'required|unique:kategori',
            ]);

            if ($validator->fails()) {
                echo ' <script> alert("Gagal, silahkan isi/kategori sudah tersedia") </script> ';
            }else {
                $kat->nama_kategori = $request->input('nama_kategori');
                $kat->save();
                return redirect('admin/kategori');
            }
        }

        return view('admin.kategori', $data);
    }

    public function  video(Request $request) {
        $data = array(
            'video' => VideoModel::orderby('id', 'desc')->paginate(5),
        );
        return view('admin.video', $data);
    }

    public function  videoView(Request $request) {
        $data = array(
            'video' => VideoModel::find($request->id),
        );
        return view('admin.video_view', $data);
    }

    public function  videoAdd(Request $request) {

        $video = new VideoModel();

        $data = array(
            'materi' => MateriModel::all(),
        );

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama_video' => 'required',
                // 'deskripsi'  => 'required',
                'id_materi'  => 'required',
                // 'video'      => 'required',
                'thumbnail'  => 'required',
            ]);

            if ($validator->fails()) {
                echo '<script>alert("Masukan data dengan benar")</script>';
            } else {
                $video->nama_video = $request->input('nama_video');
                $video->id_materi  = $request->input('id_materi');
                $video->deskripsi  = $request->input('deskripsi');
                $video->thumbnail  = $request->input('thumbnail');
                $video->video      = $request->input('video');

                $ex = explode('.',$_FILES['thumbnail']['name']);
                if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                    echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                }else {
                    $thumbnail = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_video'), '-') . '.jpg';
                    Image::make($_FILES['thumbnail']['tmp_name'])->fit(773, 434)->save('video/'.$thumbnail);
                    $video->thumbnail = $thumbnail;

                    $vi = explode('.',$_FILES['video']['name']);
                    if ($vi[count($vi) - 1] != "mp4" && $vi[count($vi) - 1] != "mkv") {
                        echo ' <script> alert("Video Fail harus MP4/MKV") </script> ';
                    }else {
                        $namaVideo = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_video'), '-') . '.mp4';
                        move_uploaded_file($_FILES['video']['tmp_name'], 'video/' . $namaVideo);

                        $video->video = $namaVideo;
                        $video->save();
                        return redirect('admin/video');
                    }
                }
            }
        }

        return view('admin.video_add', $data);
    }

    public function  videoAddMateri(Request $request) {

        $video = new VideoModel();

        $data = array(
            'materi' => MateriModel::where('id', $request->id)->get(),
        );

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama_video' => 'required',
                // 'deskripsi'  => 'required',
                'id_materi'  => 'required',
                // 'video'      => 'required',
                'thumbnail'  => 'required',
            ]);

            if ($validator->fails()) {
                echo '<script>alert("Masukan data dengan benar")</script>';
            } else {
                $video->nama_video = $request->input('nama_video');
                $video->id_materi  = $request->input('id_materi');
                $video->deskripsi  = $request->input('deskripsi');
                $video->thumbnail  = $request->input('thumbnail');
                $video->video      = $request->input('video');

                $ex = explode('.',$_FILES['thumbnail']['name']);
                if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                    echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                }else {
                    $thumbnail = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_video'), '-') . '.jpg';
                    Image::make($_FILES['thumbnail']['tmp_name'])->fit(773, 434)->save('video/'.$thumbnail);
                    $video->thumbnail = $thumbnail;

                    $vi = explode('.',$_FILES['video']['name']);
                    if ($vi[count($vi) - 1] != "mp4" && $vi[count($vi) - 1] != "mkv") {
                        echo ' <script> alert("Video Fail harus MP4/MKV") </script> ';
                    }else {
                        $namaVideo = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_video'), '-') . '.mp4';
                        move_uploaded_file($_FILES['video']['tmp_name'], 'video/' . $namaVideo);

                        $video->video = $namaVideo;
                        $video->save();
                        return redirect('admin/video');
                    }
                }
            }
        }

        return view('admin.video_add', $data);
    }

    public function videoEdit(Request $request) {
        $video = VideoModel::find($request->id);
        $data  = array(
            'video' => $video,
            'materi' => MateriModel::all(),
        );

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama_video' => 'required',
                'deskripsi'  => 'required',
                'id_materi'  => 'required',
            ]);

            if ($validator->fails()) {
                echo '<script>alert("Masukan data dengan benar")</script>';
            } else {

                $ex = explode('.',$_FILES['thumbnail']['name']);
                if ($ex[count($ex) - 1] == "") {

                    $vi = explode('.',$_FILES['video']['name']);
                    if ($vi[count($vi) - 1] == "") {
                        $video->nama_video = $request->input('nama_video');
                        $video->id_materi  = $request->input('id_materi');
                        $video->deskripsi  = $request->input('deskripsi');
                        $video->save();
                        return redirect('admin/video');
                    } else {
                        $video->nama_video = $request->input('nama_video');
                        $video->id_materi  = $request->input('id_materi');
                        $video->deskripsi  = $request->input('deskripsi');
                        $video->video      = $request->input('video');

                        $vi = explode('.',$_FILES['video']['name']);
                        if ($vi[count($vi) - 1] != "mp4" && $vi[count($vi) - 1] != "mkv") {
                            echo ' <script> alert("Video Fail harus MP4/MKV") </script> ';
                        }else {
                            $namaVideo = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_video'), '-') . '.mp4';
                            move_uploaded_file($_FILES['video']['tmp_name'], 'video/' . $namaVideo);

                            $video->video = $namaVideo;
                            $video->save();
                            return redirect('admin/video');
                        }
                    }

                } else {
                    $vi = explode('.',$_FILES['video']['name']);
                    if ($vi[count($vi) - 1] != "mp4" && $vi[count($vi) - 1] != "mkv") {
                        $video->nama_video = $request->input('nama_video');
                        $video->id_materi  = $request->input('id_materi');
                        $video->deskripsi  = $request->input('deskripsi');
                        $video->thumbnail  = $request->input('thumbnail');
                        $video->video      = $request->input('video');

                        $ex = explode('.',$_FILES['thumbnail']['name']);
                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $thumbnail = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_video'), '-') . '.jpg';
                            Image::make($_FILES['thumbnail']['tmp_name'])->fit(773, 434)->save('video/'.$thumbnail);
                            $video->thumbnail = $thumbnail;

                            $video->save();
                            return redirect('admin/video');

                        }
                    } else {
                        $video->nama_video = $request->input('nama_video');
                        $video->id_materi  = $request->input('id_materi');
                        $video->deskripsi  = $request->input('deskripsi');
                        $video->thumbnail  = $request->input('thumbnail');
                        $video->video      = $request->input('video');

                        $ex = explode('.',$_FILES['thumbnail']['name']);
                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $thumbnail = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_video'), '-') . '.jpg';
                            Image::make($_FILES['thumbnail']['tmp_name'])->fit(773, 434)->save('video/'.$thumbnail);
                            $video->thumbnail = $thumbnail;

                            $vi = explode('.',$_FILES['video']['name']);
                            if ($vi[count($vi) - 1] != "mp4" && $vi[count($vi) - 1] != "mkv") {
                                echo ' <script> alert("Video Fail harus MP4") </script> ';
                            }else {
                                $namaVideo = date('d-m-Y-H-m-s-') . str_slug($request->input('nama_video'), '-') . '.mp4';
                                move_uploaded_file($_FILES['video']['tmp_name'], 'video/' . $namaVideo);

                                $video->video = $namaVideo;
                                $video->save();
                                return redirect('admin/video');
                            }
                        }
                    }
                }
            }
        }

        return view('admin.video_add', $data);
    }

    public function videoDel(Request $request) {
        $video = VideoModel::find($request->id);
        $video->delete();
        unlink('video/' . $video->thumbnail);
        unlink('video/' . $video->video);
        return redirect('admin/video');
    }

    public function setting(Request $request) {
        $user = User::find(Auth::user()->id);
        $data = array(
            'user' => $user,
        );

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name'      => 'required',
                'email'     => 'required',
                'password2' => 'same:password'
            ]);

            if ($validator->fails()) {
                echo '<script>alert("Update Gagal")</script>';
            } else {

                $ex  = explode('.',$_FILES['gambar']['name']);
                if ($ex[count($ex) - 1] == "") {
                    if ($request->input('password') == "") {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');

                        $user->save();
                        return redirect('admin/setting');
                    } else {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');
                        $user->password = Hash::make($request->input('password'));

                        $user->save();
                        return redirect('admin/setting');
                    }

                } else {
                    if ($request->input('password') == "") {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');
                        $user->gambar   = $request->input('gambar');

                        $ex = explode('.',$_FILES['gambar']['name']);

                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $namaGambar = Auth::user()->gambar;
                            Image::make($_FILES['gambar']['tmp_name'])->fit(200, 200)->save('assets/img/user/'.$namaGambar);

                            $user->gambar = $namaGambar;
                            $user->save();
                            return redirect('admin/setting');
                        }

                    } else {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');
                        $user->gambar   = $request->input('gambar');
                        $user->password = Hash::make($request->input('password'));

                        $ex  = explode('.',$_FILES['gambar']['name']);
                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $namaGambar = Auth::user()->gambar;
                            Image::make($_FILES['gambar']['tmp_name'])->fit(200, 200)->save('assets/img/user/'.$namaGambar);

                            $user->gambar = $namaGambar;
                            $user->save();
                            return redirect('admin/setting');
                        }
                    }
                }
            }
        }

        return view('admin.setting', $data);
    }

    public function search(Request $request) {
        $materi = MateriModel::Where('nama_materi', 'like' , '%' . $request->q . '%')->take(5)->get();
        $video  = VideoModel::Where('nama_video', 'like' , '%' . $request->q . '%')->take(5)->get();
        $user   = User::Where('name', 'like' , '%' . $request->q . '%')->take(5)->get();

        $data = array(
            'materi'   => $materi,
            'video'    => $video,
            'user'     => $user,
            'kategori' => KategoriModel::all(),
        );
        return view('admin.search', $data);
    }

    public function searchMateri(Request $request) {
        $materi = MateriModel::Where('nama_materi', 'like' , '%' . $request->q . '%')->take(5)->get();

        $data = array(
            'materi'   => $materi,
            'kategori' => KategoriModel::all(),
        );
        return view('admin.materi', $data);
    }

    public function searchVideo(Request $request) {
        $video  = VideoModel::Where('nama_video', 'like' , '%' . $request->q . '%')->take(5)->get();

        $data = array(
            'video'   => $video,
            'kategori' => KategoriModel::all(),
        );
        return view('admin.video', $data);
    }

    public function searchUser(Request $request) {
        $user   = User::Where('name', 'like' , '%' . $request->q . '%')->take(5)->get();

        $data = array(
            'user'   => $user,
        );
        return view('admin.user', $data);
    }
}
