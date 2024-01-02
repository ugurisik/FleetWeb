<?php

use App\middleware\adminFiles\authMw as authMw;
use App\middleware\adminFiles\categoriesMw as categoriesMw;

class categories extends controller
{
    public function index(...$params)
    {
        $categoriesMw = new categoriesMw();
        $authMw = new authMw();
        $authMw->isLogged(false);
        if ($params[1] == 'insert') {
            echo $categoriesMw->insert($_POST, $params[0]);
        } else if ($params[1] == 'update') {
            echo $categoriesMw->update($_POST, $params[0]);
        } else if ($params[0] == 'delete') {
            echo $categoriesMw->delete($_POST);
        } else {
            $categories = $categoriesMw->getCategories($params[0]);
            $this->view('admin', 'categories', ['type' => 'list', 'Datas' => $categories, 'CatType' => $params[0]]);
        }
    }
    public function add(...$params)
    {
        $authMw = new authMw();
        $categoriesMw = new categoriesMw();
        $authMw->isLogged(false);
        $categories = $categoriesMw->getCategories($params[0]);
        $this->view('admin', 'categories', ['type' => 'add', 'Categories' => $categories, 'CatType' => $params[0]]);
    }

    public function edit(...$params)
    {
        $authMw = new authMw();
        $categoriesMw = new categoriesMw();
        $authMw->isLogged(false);
        $categories = $categoriesMw->getCategories($params[0]);
        $data = $categoriesMw->getCategory($params[1]);

        $this->view('admin', 'categories', ['type' => 'edit', 'Categories' => $categories, 'Data' => $data, 'CatType' => $params[0]]);
    }
}
