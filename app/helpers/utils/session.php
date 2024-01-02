<?php
namespace App\helpers\utils;

class session
{
    public function createSession($array = [])
    {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    public function deleteSession($key)
    {
        unset($_SESSION["" . $key . ""]);
    }
    public function allSessionDelete()
    {
        session_unset();
        session_destroy();
    }
    public function getSession($key)
    {
        return $_SESSION['' . $key . ''];
    }
    public function getAll()
    {
        if (empty($_SESSION)) {
            $_SESSION['null'] = "null";
        }
        return $_SESSION;
    }
}
