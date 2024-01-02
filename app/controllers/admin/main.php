<?php
use App\middleware\adminFiles\authMw as authMw;
class main extends controller
{
    public function index()
    {
        $authMw = new authMw();
        $authMw->isLogged(false);
        $this->view('admin', 'index');
    }
    public function test()
    {
        echo "test page";
    }
}
