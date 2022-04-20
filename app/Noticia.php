<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";

    protected $fillable = [
        'id_user',
        'title',
        'description',
        'img',
        'estado',
    ];

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id_user_create', 'id');
    }
}