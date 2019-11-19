<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;
use App\Services\LinkService;

class UsuarioService
{

    protected $usuarioRepository;
    protected $linkService;

    public function __construct(LinkService $linkService, UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->linkService = $linkService;
    }

    public function criar($dadosUsuario = [])
    {
        if (!empty($dadosUsuario["hash"])) {
            $link = $this->linkService->getByHash($dadosUsuario["hash"]);
            $dadosUsuario["usuario_convite"] = $link->usuario_id;
        }

        return $this->usuarioRepository->criar($dadosUsuario);
    }

    public function getById($id)
    {
        return $this->usuarioRepository->getById($id);
    }
}
