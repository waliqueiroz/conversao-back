<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRepository
{

    public function getByHash($hash)
    {
        return Link::where('hash', '=', $hash)->with('usuario')->first();
    }
}
