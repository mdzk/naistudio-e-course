<?php

namespace App\Http\Controllers;

use App\BeliModel;
use App\MateriModel;
use App\User;
use App\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request) {
//
        $data = array(
           'user'   => User::Where('level', 'user')->get(),
           'materi' => MateriModel::all(),
           'video'  => VideoModel::all(),
           'saldo'  => BeliModel::all(),
        );

        return view('admin.index', $data);
    }
}
