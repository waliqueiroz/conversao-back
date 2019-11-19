<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function criar(UsuarioRequest $request)
    {
        $dadosUsuario = $request->all();
        $usuario = $this->usuarioService->criar($dadosUsuario);
        return response()->json($usuario);
    }

    public function getById($id)
    {
        return $this->usuarioService->getById($id);
    }
}
