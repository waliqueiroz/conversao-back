<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;
use App\Services\LinkService;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailUsuarioIndicado;
use App\Mail\SendMailUsuarioNovo;

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
        // Se o cadastro for feito a partir de um link personalizado, o usuário que fez o convite fica registrado
        if (!empty($dadosUsuario["hash"])) {
            $link = $this->linkService->getByHash($dadosUsuario["hash"]);
            $dadosUsuario["usuario_indicacao"] = $link->usuario->id;
            $dadosUsuario["tipo_cadastro"] = "Indicação";
            $this->emailIndicacao($link->usuario); // Email para o usuario dono do link
        } else {
            $dadosUsuario["tipo_cadastro"] = "Sem indicação";
        }

        $usuario = $this->usuarioRepository->criar($dadosUsuario);
        $this->emailCadastro($usuario); // Email para o novo usuário cadastrado
        return $usuario;
    }

    public function getById($id)
    {
        return $this->usuarioRepository->getById($id);
    }

    private function emailCadastro($usuario)
    {
        Mail::to($usuario->email)->send(new SendMailUsuarioNovo($usuario));
    }

    private function emailIndicacao($usuario)
    {
        Mail::to($usuario->email)->send(new SendMailUsuarioIndicado($usuario));
    }
}
