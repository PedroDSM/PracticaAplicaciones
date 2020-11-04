<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
        /**
     * The table associated with the model.
     * 
     * @vas string
     */
    protected $table = 'personas';
    public $timestamps = false;

    public function comentario(){
        return $this->hasmany('App\Modelos\comentario');
    }
}
