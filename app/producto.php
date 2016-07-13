<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model {

    protected $table = "productos";
    protected $fillable = ['nombre', 'imagen', 'costo', 'usuario_id'];

    public function usuario() {
        return $this->belongsTo('App\User');
    }

    public function categorias() {
        return $this->belongsToMany('App\categoria')->withTimestamps();
    }

}
