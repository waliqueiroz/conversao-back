<?php

namespace App\Repositories;

use App\Models\User;
use DB;

class UsuarioRepository
{
    public function criar($dadosUsuario)
    {
        try {
            DB::beginTransaction();
            $usuario = User::create($dadosUsuario);
            $hash = md5($usuario->email);
            $usuario->link()->create(["hash" => $hash]);
            DB::commit();

            return $usuario;
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function getById($id)
    {
        return User::with('link')->find($id);
    }
}
