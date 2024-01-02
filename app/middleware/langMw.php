<?php

namespace App\middleware;

use App\helpers\utils\functions as functions;
use App\helpers\utils\session as session;

class langMw
{
    public  $func, $session;
    public function __construct()
    {
        $this->func = new functions;
        $this->session = new session;
    }
    public function setLang($lang = 'en')
    {

        // file lang/$lang.fleet.json if not exist set default lang
        if (!file_exists('lang/' . $lang . '.fleet.json')) {
            $lang = 'en';
        }
        $this->session->createSession(['lang' => $lang]);
        $this->func->redirect(SITE_URL);
    }
    public function getLang()
    {
        if (isset($_SESSION['lang'])) {
            return $_SESSION['lang'];
        } else {
            return 'en';
        }
    }
    public function getLangFile()
    {
        $lang = $this->getLang();
        $langFile = file_get_contents('lang/' . $lang . '.fleet.json');
        return json_decode($langFile, true);
    }
}
