<?php
use App\helpers\utils\session as session;
class System
{
    protected $controller = "main";
    protected $method = "index";
    protected $params = [];
    protected $adminPath = ADMIN_URI;
    public function __construct()
    {
        self::token();
        $url = self::parseUrl();
        $url = self::checkFile($url);
        $url = self::checkClass($url);
        $url = self::checkMethod($url);
        $this->params = self::clearUrl($url);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function token()
    {
        $session = new session;
        if(empty($session->getSession(TOKENIZER))){
            $session->createSession([TOKENIZER => bin2hex(random_bytes(32))]);
        }
    }

    public function parseUrl()
    {
        if (isset($_GET['act'])) {
            return $url =  explode('/', filter_var(rtrim($_GET['act'], '/'), FILTER_SANITIZE_URL));
        } else {
            $url[0] = $this->controller;
            $url[1] = $this->method;
            return $url;
        }
    }
    public function checkFile($url = [])
    {
        if ($url[0] == $this->adminPath) {
            $controllerPath = ADMIN_CONTROLLER;
            array_shift($url);
        } else {
            $controllerPath = CONTROLLER;
        }
        if (file_exists($controllerPath . $url[0] . '.php')) {
            $this->controller = $url[0];
            array_shift($url);
            require_once  $controllerPath . $this->controller . '.php';
        } else {
            require_once  $controllerPath . $this->controller . '.php';
        }
        return $url;
    }

    public function checkMethod($url = [])
    {
        if (isset($url[0])) {
            if (method_exists($this->controller, $url[0])) {
                $this->method = $url[0];
                array_shift($url);
            }
        }
        return $url;
    }
    public function checkClass($url = [])
    {
        if (class_exists($this->controller)) {
            $this->controller = new $this->controller;
        }
        return $url;
    }

    public function clearUrl($url = [])
    {
        if ($url[0] == $this->controller && $url[1] == $this->method) {
            array_shift($url);
            array_shift($url);
        }
        return $url;
    }
}
