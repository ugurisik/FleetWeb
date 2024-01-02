<?php

use App\middleware\userFiles\userAuthMw as authMw;
use App\helpers\utils\fileUpload as fileUpload;

class upload extends controller
{
    public function index(...$params)
    {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $path = $params[0] ?? 'random';
            $name = null;
            $upload = fileUpload::upload($file, $path, $name);
            if ($upload != false) {
                echo json_encode(array('status' => 'success', 'file' => $upload));
            } else {
                echo json_encode(array('status' => 'error'));
            }
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}
