<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    //
    public $table = "video";
    public $timestamps = false;

    public function materi() {
        return $this->hasOne('App\MateriModel', 'id','id_materi');
    }
}
