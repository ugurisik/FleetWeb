<?php



namespace App\helpers\utils;

use App\middleware\langMw as langMw;

class lang
{
    public $lang, $langFile;
    public function __construct()
    {
        $this->lang = new langMw;
        $this->langFile = $this->lang->getLangFile();
    }
    public function get($key)
    {
        $langFile = $this->langFile;
        $key = explode('.', $key);
        foreach ($key as $k) {
            $langFile = $langFile[$k];
        }
        return $langFile;
    }
    public function generateTokenSession()
    {
        if (empty($_SESSION[TOKENIZER])) {
            $_SESSION[TOKENIZER] = md5(uniqid(rand(), TRUE));
        } else {
            return $_SESSION[TOKENIZER];
        }
    }
}
