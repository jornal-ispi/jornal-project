<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscritor extends Model
{
    protected $table = "subscritors";

    protected $fillable = [
        'id_user',
        'email',
        'estado',
    ];

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}