<?php

namespace App\helpers\utils;

class hash
{
    public $key = "K3dk9sz3.!*19992015";
    public $cipher = "AES-128-CBC";
    public function encrypt($string)
    {
        return openssl_encrypt($string, $this->cipher, $this->key);
    }
    public function decrypt($string)
    {
        return openssl_decrypt($string, $this->cipher, $this->key);
    }
}
