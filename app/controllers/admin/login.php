<?php

use App\middleware\adminFiles\authMw as authMw;

class login extends Controller
{
    public function index(...$params)
    {
        $auth = new authMw;
        if (isset($_POST['email']) && isset($_POST['password'])) {
            echo $auth->Login($_POST['email'], $_POST['password']);
        } else {
            $auth->isLogged(true);
            $this->view('admin', 'login', [], false);
        }
    }
}
