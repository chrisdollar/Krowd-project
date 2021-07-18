<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Markdown extends Facade {

    protected static function getFacadeAccessor()
    {
        return \cebe\markdown\GithubMarkdown::class;
    }

}