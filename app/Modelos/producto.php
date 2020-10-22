<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @vas string
     */
    protected $table = 'productos';
    public $timestamps = false;
}
