<?php



namespace App\helpers\utils;

use App\helpers\utils\session as session;
use App\model\database as db;
use App\middleware\fleetFiles\authMw as authMw;

class frontEnd extends authMw
{
    public $session, $db;
    public function __construct()
    {
        $this->session = new session;
        $this->db = new db;
    }

    public function userInfo()
    {
        $db = new db;
        $userguid = $this->session->getSession('USER_GUID');
        $data = $db->getOneData('gs_users', ['Guid' => $userguid]);
        $data['info'] = json_decode($data['info'], true);
        $data['privileges'] = json_decode($data['privileges'], true);
        return $data;
    }
    public function companyInfo()
    {
        $data = $this->findTopUser();
        $data['info'] = json_decode($data['info'], true);
        $data['privileges'] = json_decode($data['privileges'], true);
        return $data;
    }
    public function subUsers()
    {
        $data = $this->findSubUser();
        foreach ($data as $key => $value) {
            $data[$key]['info'] = json_decode($value['info'], true);
            $data[$key]['privileges'] = json_decode($value['privileges'], true);
        }
        return $data;
    }
}
