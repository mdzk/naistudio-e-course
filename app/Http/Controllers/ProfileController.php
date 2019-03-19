<?php

namespace App\Http\Controllers;

use App\BeliModel;
use App\BookmarkModel;
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
            'materi'   => BeliModel::Where('id_user', '=', Auth::user()->id)->get(),
            'bookmark' => BookmarkModel::Where('id_user', '=', Auth::user()->id)->get(),
        );

        return view('profile', $data);
    }

    public function edit(Request $request) {

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
                            $namaGambar = date('d-m-Y-H-m-s-') . str_slug($request->input('name'), '-') . '.jpg';
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
                            $namaGambar = date('d-m-Y-H-m-s-') . str_slug($request->input('name'), '-') . '.jpg';
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
}
