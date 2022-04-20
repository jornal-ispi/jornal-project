<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "usuarios";

    protected $fillable = [
        'username',
        'password',
        'acesso',
        'codigo',
        'estado',
    ];

    public function mensagem_user_send()
    {
        return $this->hasMany(Mensagem::class, 'id_user_send', 'id');
    }

    public function mensagem_user_receive()
    {
        return $this->hasMany(Mensagem::class, 'id_user_receive', 'id');
    }

    public function noticias()
    {
        return $this->hasMany(Noticia::class, 'id_user', 'id');
    }

    public function subscritors()
    {
        return $this->hasMany(Subscritor::class, 'id_user', 'id');
    }
}
