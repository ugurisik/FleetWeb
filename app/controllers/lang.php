<?php

use App\middleware\langMw as langMw;

class lang extends controller
{
    public function index(...$params)
    {
        $lang = new langMw;
        $lang->setLang($params[0]);
    }
}
