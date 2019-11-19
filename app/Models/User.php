<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'telefone', 'cpf', 'usuario_convite'
    ];

    public function usuarioConvite()
    {
        return $this->belongsTo('App\Models\User', 'usuario_convite');
    }

    public function link()
    {
        return $this->hasOne('App\Models\Link', 'usuario_id');
    }
}
