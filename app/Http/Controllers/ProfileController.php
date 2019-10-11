<?php

namespace App\Http\Controllers;

use App\BeliModel;
use App\BookmarkModel;
use App\MateriModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ProfileController extends Controller
{
    //
    public function profile(Request $request) {
        $data = array(
            'notif'   => MateriModel::orderBy('id', 'desc')->take(5)->get(),
            'materi'   => BeliModel::Where('status', 2)->Where('id_user',Auth::user()->id)->get(),
            'bookmark' => BookmarkModel::Where('id_user', '=', Auth::user()->id)->get(),
        );

        return view('profile', $data);
    }

    public function edit(Request $request) {

        $user = User::find(Auth::user()->id);
        $data = array(
            'notif'   => MateriModel::orderBy('id', 'desc')->take(5)->get(),
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
                        return redirect('/profile');
                    } else {
                        $user->name     = $request->input('name');
                        $user->email    = $request->input('email');
                        $user->status   = $request->input('status');
                        $user->bio      = $request->input('bio');
                        $user->password = Hash::make($request->input('password'));

                        $user->save();
                        return redirect('profile');
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
                            return redirect('profile');
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
                            return redirect('profile');
                        }
                    }
                }
            }
        }

        return view('setting', $data);
    }

    public function history(Request $request) {
        $unbeli = BeliModel::Where('status', 1)->Where('id_user',Auth::user()->id)->get();
        $beli = BeliModel::Where('status', 2)->Where('id_user',Auth::user()->id)->get();

        $data = array(
            'notif'  => MateriModel::orderBy('id', 'desc')->take(5)->get(),
            'unpaid' => $unbeli, 
            'paid'   => $beli, 
        );

        return view('history', $data);
    }

    public function historyView(Request $request) {

        $data = array(
            'notif'  => MateriModel::orderBy('id', 'desc')->take(5)->get(),
            'beli'   => BeliModel::where('invoice', $request->invoice)->first(),
        );

        if (Auth::user()) {
            $beli = BeliModel::where('id_user', '=', Auth::user()->id)->where('invoice', '=', $request->invoice)->get();

            if (count($beli) == 0) {
                return redirect('profile/history');
            } else {
                if ($request->isMethod('post')) {
                    BeliModel::Where('invoice', $request->input('cancel'))->delete();
                    return redirect('profile/history');
                }

                return view('invoice', $data);
            }

        } else {
            return redirect('login');
        }
    }

    public function historyConfirm(Request $request) {
        $beli = BeliModel::where('invoice', $request->invoice)->first();
        $data = array(
            'notif'  => MateriModel::orderBy('id', 'desc')->take(5)->get(),
            'beli'   => $beli,
        );

        if (Auth::user()) {
            $valid = BeliModel::where('id_user', '=', Auth::user()->id)->where('invoice', '=', $request->invoice)->get();

            if (count($valid) == 0) {
                return redirect('profile/history');
            } else {
                
                if ($request->isMethod('post')) {
                    $validator = Validator::make($request->all(), [
                        'nama'     => 'required',
                        'rekening' => 'required',
                        'tanggal'  => 'required',
                        'gambar'   => 'required',
                    ]);

                    if ($validator->fails()) {
                        echo '<script>alert("Masukan data dengan benar")</script>';
                    } else {
                        $beli->tr_nama     = $request->input('nama');
                        $beli->tr_rekening = $request->input('rekening');
                        $beli->tr_tanggal  = $request->input('tanggal');

                        $beli->gambar      = $request->input('gambar');
                        $ex = explode('.',$_FILES['gambar']['name']);

                        if ($ex[count($ex) - 1] != "jpg" && $ex[count($ex) - 1] != "jpeg" && $ex[count($ex) - 1] != "png") {
                            echo ' <script> alert("Gambar Fail harus JPG/PNG") </script> ';
                        }else {
                            $namaGambar = time() . '.jpg';
                            Image::make($_FILES['gambar']['tmp_name'])->save('assets/img/payment/'.$namaGambar);

                            $beli->gambar = $namaGambar;
                            $beli->save();
                            return redirect('profile/history/confirm/success');
                        }
                    }
                }

                return view('confirm', $data);

            }

        } else {
            return redirect('login');
        }
    }

    public function historyConfirmSuccess(Request $request) {
        $data = array(
            'notif'  => MateriModel::orderBy('id', 'desc')->take(5)->get(),
            'beli'   => BeliModel::where('invoice', $request->invoice)->first(),
        );

        return view('success', $data);
    }
}
