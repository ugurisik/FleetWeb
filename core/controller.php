<?php

use App\helpers\utils\debugBar as debugBar;
use App\helpers\utils\frontEnd as frontEnd;
use App\helpers\utils\lang as lang;

class controller
{
    public $debugBar, $frontEnd, $lang;
    public function __construct()
    {
        $this->debugBar = new debugBar();
        $this->frontEnd = new frontEnd();
        $this->lang = new lang();
    }
    public function view($theme, $file, $params = [], $isIncFiles = true)
    {
        if (file_exists(VIEW_PATH . $theme . '/' . $file . '.php')) {
            if ($isIncFiles) {
                require_once VIEW_PATH . $theme . '/inc/header.php';
                if (DEBUG) {
                    $this->debugBar->renderHead();
                }
            }
            if (file_exists(VIEW_PATH . $theme . '/' . $file . '.php')) {
                require_once VIEW_PATH . $theme . '/' . $file . '.php';
            } else {
                header("HTTP/1.0 404 Not Found");
                $this->debugBar->setMessage('Theme: ' . $theme . ' File: ' . $file . ' Not Found');
            }
            if ($isIncFiles) {
                require_once VIEW_PATH . $theme . '/inc/footer.php';
                if (DEBUG) {
                    $this->debugBar->renderFoot();
                }
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo '404 Not Found';
            if (DEBUG) {
                $this->debugBar->setMessage('Theme: ' . $theme . ' File: ' . $file . ' Not Found');
                $this->debugBar->renderHead();
                $this->debugBar->renderFoot();
            }
        }
    }
}
