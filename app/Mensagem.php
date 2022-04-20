<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = "mensagems";

    protected $fillable = [
        'id_user_send',
        'id_user_receive',
        'sms',
        'status_sms',
        'estado',
    ];

    public function user_send(){
        return $this->belongsTo(User::class, 'id_user_send', 'id');
    }

    public function user_receive(){
        return $this->belongsTo(User::class, 'id_user_receive', 'id');
    }
}