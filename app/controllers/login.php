<?php

use App\middleware\fleetFiles\authMw as authMw;

class login extends Controller
{
    public function index(...$params)
    {
        $auth = new authMw;
        if (isset($_POST['username']) && isset($_POST['password'])) {
            echo $auth->Login($_POST['username'], $_POST['password'], $_POST[TOKENIZER]);
        } else {
            $auth->isLogged(true);
            $this->view('fleet', 'login', [], false);
        }
    }
}
