<?php

use App\middleware\fleetFiles\operatorMw as operatorMw;

class operator extends controller
{
    public function index(...$params)
    {
        $operator = new operatorMw();
        echo json_encode($operator->getByBranch(), JSON_UNESCAPED_UNICODE);
        if (isset($params[0]) && !empty($params[0])) {
            $get = $params[0];
            if ($get == 'list') {
                $type = 'list';
            } else if ($get == 'add') {
                $type = 'add';
            } else if ($get == 'edit') {
            }
        } else {
            $type = 'list';
        }
        $this->view("fleet", "operator", ['type' => $type]);
    }
    public function action(...$params)
    {
        if (isset($params[0]) && !empty($params[0])) {
            $get = $params[0];
            $operator = new operatorMw();
            if ($get == 'insert') {
                echo $operator->insert($_POST);
            } else if ($get == 'update') {
                echo $operator->update($params[1], $_POST);
            } else if ($get == 'delete') {
                echo  $operator->delete($params[1]);
            }
        } else {
            $message = [
                'status' => 'error',
                'message' => 'Invalid request'
            ];
            echo json_encode($message, JSON_UNESCAPED_UNICODE);
        }
    }
}
