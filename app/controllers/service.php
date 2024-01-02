<?php
class service extends controller
{
    public function index(...$params)
    {
        if (isset($params[0]) && !empty($params[0])) {
            $get = $params[0];
            if ($get == 'list') {
                $type = 'list';
            } else if ($get == 'add') {
                $type = 'add';
            } else if ($get == 'typeList') {
                $type = 'typeList';
            } else if ($get == 'edit') {
            }
        } else {
            $type = 'list';
        }
        $this->view("fleet", "service", ['type' => $type]);
    }
}
