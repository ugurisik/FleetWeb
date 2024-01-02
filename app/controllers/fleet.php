<?php

use App\middleware\fleetFiles\dashboardMw as dashboardMw;

class fleet extends controller
{
    public function index(...$params)
    {
        $dash = new dashboardMw;
        $company = $dash->getCompanyInfo();
        $this->view('fleet', 'index', ['Company' => $company], true);
    }
}
