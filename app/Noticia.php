<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";

    protected $fillable = [
        'id_user_create',
        'title',
        'description',
        'img',
        'estado',
    ];

    public function user_create()
    {
        return $this->belongsTo(User::class, 'id_user_create', 'id');
    }
}