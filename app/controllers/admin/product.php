<?php

use App\middleware\adminFiles\authMw as authMw;
use App\middleware\adminFiles\productMw as productMw;

class product extends controller
{
    public function index(...$params)
    {
        $productMw = new productMw();
        $authMw = new authMw();
        $authMw->isLogged(false);
        if ($params[0] == 'insert') {
            echo $productMw->insert($_POST);
        } else if ($params[0] == 'update') {
            echo $productMw->update($_POST);
        } else if ($params[0] == 'delete') {
            echo $productMw->delete($_POST);
        } else {
            $posts = $productMw->getPosts();
            $this->view('admin', 'product', ['type' => 'list', 'Datas' => $posts]);
        }
    }
    public function add()
    {
        $authMw = new authMw();
        $productMw = new productMw();
        $authMw->isLogged(false);
        $categories = $productMw->getCategories();
        $this->view('admin', 'product', ['type' => 'add', 'Categories' => $categories]);
    }

    public function edit(...$params)
    {
        $authMw = new authMw();
        $productMw = new productMw();
        $authMw->isLogged(false);
        $categories = $productMw->getCategories();
        $data = $productMw->getPost($params[0]);

        $this->view('admin', 'product', ['type' => 'edit', 'Categories' => $categories, 'Data' => $data]);
    }
}
