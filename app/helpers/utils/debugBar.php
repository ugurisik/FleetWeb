<?php
namespace App\helpers\utils;
use DebugBar\StandardDebugBar as StandardDebugBar;

class debugBar
{
    public $dBar, $dRender;
    public function __construct()
    {
        $this->dBar = new StandardDebugBar();
        $debugbarRenderer = $this->dBar->getJavascriptRenderer()->setBaseUrl(SITE_URL . '/vendor/maximebf/debugbar/src/DebugBar/Resources/');
        $this->dRender = $debugbarRenderer;
    }
    public function renderHead()
    {
        echo $this->dRender->renderHead();
    }
    public function renderFoot()
    {
        echo $this->dRender->render();
    }
    public function setMessage($message)
    {
        $this->dBar["messages"]->addMessage($message);
    }

    public function setException($exception)
    {
        $this->dBar["exceptions"]->addException($exception);
    }

    public function setAlert($alert)
    {
        $this->dBar["alerts"]->addAlert($alert);
    }

    public function setQuery($query)
    {
        $this->dBar["queries"]->addQuery($query);
    }

    public function setRoute($route)
    {
        $this->dBar["routes"]->addRoute($route);
    }
}
