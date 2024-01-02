<?php

use App\middleware\fleetFiles\authMw as authMw;
use App\helpers\utils\functions as functions;

class logout extends controller
{
    public function index()
    {
        $authMw = new authMw();
        $func = new functions();
        $authMw->logout();
        // $func->Redirect(SITE_URL . '/login');
    }
}
