<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'hash', 'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'usuario_id');
    }
}
