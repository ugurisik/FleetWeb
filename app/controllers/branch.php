<?php
class branch extends controller
{
    public function index(...$params)
    {
        if (isset($params[0]) && !empty($params[0])) {
            $get = $params[0];
            if ($get == 'list') {
                $type = 'list';
            } else if ($get == 'addBranch') {
                $type = 'addBranch';
            } else if ($get == 'listPerson') {
                $type = 'listPerson';
            } else if ($get == 'addPerson') {
                $type = 'addPerson';
            }
        } else {
            $type = 'list';
        }
        $this->view("fleet", "branch", ['type' => $type]);
    }
}
