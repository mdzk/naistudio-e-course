<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookmarkModel extends Model
{
    //
    public $table = 'bookmark';
    public $timestamps = false;

    public function materi() {
        return $this->hasOne('App\MateriModel', 'id','id_materi');
    }

    public function user() {
        return $this->hasOne('App\User', 'id','id_user');
    }
}
