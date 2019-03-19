<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    //
    public $table = 'kategori';
    public $timestamps = false;

    public function materi() {
        return $this->hasMany('App\MateriModel', 'id_kategori','id');
    }
}
