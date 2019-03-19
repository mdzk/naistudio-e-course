<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriModel extends Model
{
    //
    public $table = "materi";
    public $timestamps = false;

    public function kategori() {
        return $this->hasOne('App\KategoriModel', 'id','id_kategori');
    }

    public function users() {
        return $this->hasOne('App\User','id','id_penulis');
    }

    public function beli() {
        return $this->hasOne('App\BeliModel','id_materi','id');
    }

}
