<?php

use App\middleware\adminFiles\authMw as authMw;
use App\middleware\adminFiles\postMw as postMw;

class post extends controller
{
    public function index(...$params)
    {
        $postMw = new postMw();
        $authMw = new authMw();
        $authMw->isLogged(false);
        if ($params[0] == 'insert') {
            echo $postMw->insert($_POST);
        } else if ($params[0] == 'update') {
            echo $postMw->update($_POST);
        } else if ($params[0] == 'delete') {
            echo $postMw->delete($_POST);
        } else {
            $posts = $postMw->getPosts();
            $this->view('admin', 'post', ['type' => 'list', 'Datas' => $posts]);
        }
    }
    public function add()
    {
        $authMw = new authMw();
        $postMw = new postMw();
        $authMw->isLogged(false);
        $categories = $postMw->getCategories();
        $this->view('admin', 'post', ['type' => 'add', 'Categories' => $categories]);
    }

    public function edit(...$params)
    {
        $authMw = new authMw();
        $postMw = new postMw();
        $authMw->isLogged(false);
        $categories = $postMw->getCategories();
        $data = $postMw->getPost($params[0]);

        $this->view('admin', 'post', ['type' => 'edit', 'Categories' => $categories, 'Data' => $data]);
    }
}
