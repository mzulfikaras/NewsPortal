<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori');
    }
}
