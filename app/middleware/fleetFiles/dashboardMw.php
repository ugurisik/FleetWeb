<?php

namespace App\middleware\fleetFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\helpers\utils\security as security;
use App\helpers\utils\frontEnd as frontEnd;
use App\middleware\fleetFiles\authMw as authMw;

class dashboardMw extends authMw
{
    public $db, $func, $mailer, $session, $security, $frontEnd;
    public function __construct()
    {
        $this->db = new db;
        $this->func = new functions;
        $this->mailer = new mailer;
        $this->session = new session;
        $this->security = new security;
        $this->isLogged(false);
    }
    public function getCompanyInfo($guid = null)
    {
        $company = $this->findTopUser($guid);
        return $company;
    }
    public function getCars()
    {
    }
    public function getOperators()
    {
    }
    public function getBranches()
    {
    }
    public function getOutcomes()
    {
    }
    public function getKm()
    {
    }
    public function getFuel()
    {
    }
    public function getCrashes()
    {
    }
    public function getIssues()
    {
    }
    public function getTickets()
    {
    }
    public function getServices()
    {
    }
}
