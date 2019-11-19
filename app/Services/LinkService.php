<?php

namespace App\Services;

use App\Repositories\LinkRepository;

class LinkService
{

    protected $linkRepository;

    public function __construct(LinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    public function getByHash($hash)
    {
        return $this->linkRepository->getByHash($hash);
    }
}
