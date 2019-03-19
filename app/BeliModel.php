<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliModel extends Model
{
    //
    public $table = 'beli';
    public $timestamps = false;

    public function materi() {
        return $this->hasMany('App\MateriModel', 'id','id_materi');
    }

    public function user() {
        return $this->hasOne('App\User', 'id','id_user');
    }
}
