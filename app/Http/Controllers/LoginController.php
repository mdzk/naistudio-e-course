<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login(Request $request){

        if(Auth::user()) {
            return redirect()->back();
        } else {
            if ($request->isMethod('post')) {
                
                if ($request->input('submit')) {
                    if (Auth::attempt([
                        'email' => $request->input('email'),
                        'password' => $request->input('password')])
                    ) {
                        if (Auth::user()->level == 'admin') {
                            return redirect('admin');
                        }else {
                            return redirect('profile');
                        }
                    }
                } else {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'email' => 'required|unique:users',
                        'password' => 'required',
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
                        return redirect('profile');
                    }
                }
            }
            return view('login');
        }
    }

    public function register(Request $request) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
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
                return redirect('profile');
            }
        }
        return view('daftar');
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
