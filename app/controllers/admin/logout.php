<?php
use App\middleware\adminFiles\authMw as authMw;
use App\helpers\utils\functions as functions;
class logout extends controller
{
    public function index()
    {
        $authMw = new authMw();
        $func = new functions();
        $authMw->logout();
        $func->Redirect(SITE_URL . '/admin/login');
    }
}
