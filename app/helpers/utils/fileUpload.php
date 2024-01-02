<?php

namespace App\helpers\utils;

class fileUpload
{
    static function upload($file, $path, $name = null)
    {
        $filePath = 'public/' . date('Y') . '/' . $path;
        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);
        }
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt', 'zip', 'rar'];

        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 2097152) {
                    if ($name == null) {
                        $file_name_new = uniqid('', true) . '.' . $file_ext;
                    } else {
                        $file_name_new = $name . '.' . $file_ext;
                    }
                    $file_destination = $filePath . '/' . $file_name_new;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        header('HTTP/1.0 200 OK');
                        return $filePath . '/' . $file_name_new;
                    } else {
                        header('HTTP/1.0 400 Bad Request');
                        return false;
                    }
                } else {
                    header('HTTP/1.0 400 Bad Request');
                    return false;
                }
            } else {
                header('HTTP/1.0 400 Bad Request');
                return false;
            }
        } else {
            header('HTTP/1.0 400 Bad Request');
            return false;
        }
    }
}
