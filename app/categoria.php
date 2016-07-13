<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model {

    protected $table = "categorias";
    protected $fillable = ['nombre', 'color'];

    public function productos() {
        return $this->belongsToMany('App\producto')->withTimestamps();
    }

}
