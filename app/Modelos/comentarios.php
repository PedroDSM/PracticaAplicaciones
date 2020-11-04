<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
        /**
     * The table associated with the model.
     * 
     * @vas string
     */
    protected $table = 'comentarios';
    public $timestamps = false;

    public function producto(){
        return $this->hasmany('App\Modelos\producto');
    }
}
